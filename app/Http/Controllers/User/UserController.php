<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
{
    $testimonials = [
        [
            'name' => 'Priyanka Priyadarshini',
            'role' => 'Professional',
            'photo' => 'images/image-6.png',
            'message' => 'Tax Plus was a lifesaver! They took care of both my income tax and GST filing , making the whole process incredibly smooth. No more scrambling between different systems – it was all streamlined and efficient.',
            'bg' => '#fff8e9'
        ],
        [
            'name' => 'Krushna Ranjan Patra',
            'role' => 'Businessmen',
            'photo' => 'images/image-9.png',
            'message' => 'I used to dread tax season, but Tax Plus has changed the game. Their platform is user-friendly and their support is fantastic. They ensure I maximize my deductions for income tax while also taking care of my GST compliance. Highly recommend!',
            'bg' => '#f9eaf9ff'
        ],
        [
            'name' => 'Satya Narayan Panda',
            'role' => 'Sr.Manager ADECCO',
            'photo' => 'images/image-6.png',
            'message' => 'Running a small business can be overwhelming, but Tax Plus takes the stress out of tax filing. They handle both my income tax return and my GST, allowing me to focus on what I do best. They are knowledgeable, professional, and always available to answer my questions.',
            'bg' => '#eaf6ff'
        ],
        [
            'name' => 'Vamshi Nallavalli',
            'role' => 'Student',
            'photo' => 'images/image-9.png',
            'message' => 'After completing my final year exams, I took the Java with Spring course...',
            'bg' => '#7f8083'
        ]
    ];

    return view('user.home', compact('testimonials'));
}

}