<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                // Must start with a capital letter, contain at least one number, and one special character
                'regex:/^(?=[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};:\'"\\|,.<>\/?]).{8,}$/'
            ],
        ], [
            'email.unique' => 'This email address is already registered.',
            'password.regex' => 'Password must start with a capital letter, contain at least one number and one special character.',
            'password.confirmed' => 'Passwords do not match.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login page with a success flash message
        return redirect()
            ->route('login')
            ->with('success', 'Registration successful! Please log in.');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to intended page or fallback to home
            return redirect()->intended(route('user.home'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Logout the user
        Auth::guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to home page
        return redirect()->route('user.home');
    }

    //login page
    public function showLoginForm()
    {
        return view('user.login');
    }

    //registration page
    public function showRegisterForm()
    {
        return view('user.register');
    }
}
