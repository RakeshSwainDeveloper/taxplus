<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomSupport;
use App\Models\UserItrDocument;
use App\Models\UserRegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    public function index()
    {
        return view('user.service');
    }

    public function itrFiling()
    {
        // Fetch all ITR plans from the database
        $plans = CustomSupport::where('source_type', 'ITR')->where('status', true)->get();

        return view('user.itr-filing', compact('plans'));
    }
    /**
     * Handles the AJAX submission for the ITR application flow.
     */
    public function storeItrApplication(Request $request)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Authentication required.'], 401);
        }

        try {
            $request->validate([
                'source_id'        => 'required|integer|exists:custom_support,id',
                'total_price'      => 'required|numeric',
                'document_method'  => 'required|in:Email,Upload,WhatsApp',
                'payment_mode'     => 'required|in:Online,UPI,Email,WhatsApp,Chat',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors()
            ], 422);
        }

        try {
            // Save the application details to the user_registration_form table
            $application = UserRegistrationForm::create([
                'user_id' => Auth::id(),
                'source_id' => $request->source_id,
                'total_price' => $request->total_price,
                'payment_status' => false, // Initially false
                'form_status' => 'Documents Shared', // Status after step 2 is complete
                'document_method' => $request->document_method,
                'payment_mode' => $request->payment_mode,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'ITR application created successfully. Proceeding with filing.',
                'application_id' => $application->id,
            ], 201);
        } catch (\Exception $e) {
            // Log::error('ITR Application Submission Error: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred during submission. Please try again.'], 500);
        }
    }

    public function uploadItrDocuments(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'application_id'  => 'required|integer|exists:user_registration_form,id',
            'documents'       => 'required|array',
            'documents.*'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'document_names'  => 'nullable|array',
        ]);


        $application = UserRegistrationForm::where('id', $request->application_id)
            ->where('user_id', Auth::id())
            ->first();

        $storedPaths = [];
        $storedNames = [];

        if (!$application) {
            return response()->json(['error' => 'Invalid application'], 404);
        }

        $files = $request->file('documents');
        $names = $request->input('document_names', []);

        foreach ($files as $i => $file) {

            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs(
                'itr-documents/' . Auth::id(),
                $filename,
                'public'
            );

            $storedPaths[] = $path;

            $storedNames[] = $names[$i] ?? $file->getClientOriginalName();
        }

        // Append to existing CSV instead of overwriting
        $docRow = UserItrDocument::firstOrNew([
            'user_id'        => Auth::id(),
            'application_id' => $application->id,
        ]);

        if ($docRow->exists) {
            $existingPaths = $docRow->document_path
                ? explode(',', $docRow->document_path)
                : [];

            $existingNames = $docRow->document_name
                ? explode(',', $docRow->document_name)
                : [];

            $storedPaths = array_merge($existingPaths, $storedPaths);
            $storedNames = array_merge($existingNames, $storedNames);
        }

        $docRow->document_path = implode(',', $storedPaths);
        $docRow->document_name = implode(',', $storedNames);
        $docRow->save();

        return response()->json([
            'success' => true,
            'message' => 'Documents uploaded successfully'
        ]);
    }

    public function gstFiling()
    {
        return view('user.gst-filing');
        // return redirect()->route('comingsoon.show', ['page' => 'gst-filing']);
    }
}
