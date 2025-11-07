<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('user.service');
    }

    public function itrFiling()
    {
        return view('user.itr-filing');
    }
    public function gstFiling()
    {
        return view('user.gst-filing');
    }
}
