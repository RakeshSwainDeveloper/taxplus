<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomSupport;
use App\Models\UserItrDocument;
use App\Models\UserRegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        // ✅ Validation (already blocks DOCX)
        $request->validate(
            [
                'application_id'  => 'required|integer|exists:user_registration_form,id',
                'documents'       => 'required|array',
                'documents.*'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'document_names'  => 'nullable|array',
            ],
            [
                'documents.*.mimes' => 'Only PDF, JPG, JPEG, and PNG files are allowed.',
                'documents.*.max'   => 'Each document must not exceed 5MB.',
            ]
        );

        $application = UserRegistrationForm::where('id', $request->application_id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$application) {
            return response()->json(['error' => 'Invalid application'], 404);
        }

        $files = $request->file('documents');
        $names = $request->input('document_names', []);

        $storedPaths = [];
        $storedNames = [];

        $userId        = Auth::id();
        $applicationId = $application->id;

        // ✅ Fetch or create document row
        $docRow = UserItrDocument::firstOrNew([
            'user_id'        => $userId,
            'application_id' => $applicationId,
        ]);

        // ✅ DELETE OLD FILES (REPLACE MODE)
        if ($docRow->exists && $docRow->document_path) {
            foreach (explode(',', $docRow->document_path) as $oldPath) {
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
        }

        // ✅ STORE NEW FILES
        foreach ($files as $i => $file) {

            $docName = $names[$i]
                ?? pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Sanitize document name
            $safeDocName = Str::slug($docName, '_');

            $extension = $file->getClientOriginalExtension();

            // REQUIRED FORMAT:
            // userid_applicationid_documentname.extension
            $filename = "{$userId}_{$applicationId}_{$safeDocName}.{$extension}";

            $path = $file->storeAs(
                "itr-documents",
                $filename,
                'public'
            );

            $storedPaths[] = $path;
            $storedNames[] = $docName;
        }

        // ✅ REPLACE DB VALUES (NO APPEND)
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
