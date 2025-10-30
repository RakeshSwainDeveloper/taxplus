<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Here you can send an email or save to DB
        // Mail::to('info@capitaltaxplus.com')->send(new ContactMail($validated));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
