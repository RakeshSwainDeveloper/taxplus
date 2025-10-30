<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    public function show()
    {
        return view('user.pricing');
    }
}