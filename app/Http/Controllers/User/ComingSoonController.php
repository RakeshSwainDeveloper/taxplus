<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ComingSoonController extends Controller
{
    public function show($page = 'default')
    {
        $pages = [
            'gst-filing' => [
                'title' => 'GST Filing',
                'message' => 'We’re crafting an intelligent GST filing experience just for you.',
            ],
            'trademark' => [
                'title' => 'Trademark Registration',
                'message' => 'Soon, you’ll be able to protect your brand effortlessly.',
            ],
            'startup-registration' => [
                'title' => 'Startup Registration',
                'message' => 'We’re setting up tools to help startups get registered quickly.',
            ],
            'default' => [
                'title' => 'Coming Soon',
                'message' => 'Something amazing is in the works!',
            ],
        ];

        $data = $pages[$page] ?? $pages['default'];

        return view('user.comingsoon', compact('data'));
    }
}
