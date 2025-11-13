<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomSupport;
use App\Models\UserRegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // You might need to seed the custom_support table with your data first.
        // E.g., Plan Name, Price, Income Source
        // Salary Plan, 799, Salary & House Property

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

        $request->validate([
            'source_id' => 'required|integer|exists:custom_support,id',
            'total_price' => 'required|numeric',
            'document_method' => 'required|string|in:Email,Upload,WhatsApp',
            'payment_mode' => 'required|string|in:Email,WhatsApp,Chat',
        ]);

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
            // Log the error for debugging
            // Log::error('ITR Application Submission Error: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred during submission. Please try again.'], 500);
        }
    }

    public function gstFiling()
    {
        return view('user.gst-filing');
        // return redirect()->route('comingsoon.show', ['page' => 'gst-filing']);
    }
}
