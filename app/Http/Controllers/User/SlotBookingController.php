<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlotBookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'type'      => 'required',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'mobile'    => 'required|digits:10',
            'book_date' => 'required|date',
        ]);

        // Insert into table
        DB::table('user_slot_booking')->insert([
            'user_name'             => $request->name,
            'user_email'            => $request->email,
            'user_mobile_number'    => $request->mobile,
            'user_slot_booking_date'=> $request->book_date,
            'source_type'           => $request->type,
            'slot_status'           => 'pending',
            'created_time'          => now(),
            'updated_time'          => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Slot booked successfully.'
        ]);
    }
}
