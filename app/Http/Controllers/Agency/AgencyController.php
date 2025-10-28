<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;

class AgencyController extends Controller
{
    public function index()
    {
        return view('agency.dashboard');
    }
}