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
        if (!Auth::check()) {
            return response()->json(['error' => 'Authentication required.'], 401);
        }

        $request->validate([
            'source_id'        => 'required|integer|exists:custom_support,id',
            'total_price'      => 'required|numeric',
            'document_method'  => 'required|in:Email,Upload,WhatsApp',
            'payment_mode'     => 'required|in:Online,UPI,Email,WhatsApp,Chat',
        ]);

        try {
            $userId   = Auth::id();
            $sourceId = $request->source_id;

            // 🔍 1️⃣ Check existing PENDING application
            $existingPendingApp = UserRegistrationForm::where('user_id', $userId)
                ->where('source_id', $sourceId)
                ->where('form_status', 'pending')
                ->first();

            // 🔁 REUSE pending application
            if ($existingPendingApp) {
                return response()->json([
                    'success'         => true,
                    'message'         => 'Existing pending application reused.',
                    'application_id'  => $existingPendingApp->id,
                    'reused'          => true
                ], 200);
            }

            // ➕ 2️⃣ Create NEW application if last one is success / failed
            $newApplication = UserRegistrationForm::create([
                'user_id'         => $userId,
                'source_id'       => $sourceId,
                'total_price'     => $request->total_price,
                'payment_status'  => false,
                'form_status'     => 'pending',
                'document_method' => $request->document_method,
                'payment_mode'    => $request->payment_mode,
            ]);

            return response()->json([
                'success'        => true,
                'message'        => 'New application created.',
                'application_id' => $newApplication->id,
                'reused'         => false
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create application.'
            ], 500);
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

        //  Fetch or create document row
        $docRow = UserItrDocument::firstOrNew([
            'user_id'        => $userId,
            'application_id' => $applicationId,
        ]);

        // DELETE OLD FILES (REPLACE MODE)
        if ($docRow->exists && $docRow->document_path) {
            foreach (explode(',', $docRow->document_path) as $oldPath) {
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
        }

        //  STORE NEW FILES
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

        // REPLACE DB VALUES (NO APPEND)
        $docRow->document_path = implode(',', $storedPaths);
        $docRow->document_name = implode(',', $storedNames);
        $docRow->save();

        $application->update([
            'form_status' => 'success'
        ]);

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
