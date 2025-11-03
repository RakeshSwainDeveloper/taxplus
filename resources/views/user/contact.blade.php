@extends('layouts.app')

@push('styles')
@vite(['resources/css/user/contact.css'])
@endpush

@section('content')
<div class="contact-page">
    <div class="container">
        <div class="contact-header">
            <div class="icon-envelope">
                <img src="{{ asset('images/contact-envolpe-image.png') }}" alt="Envelope Illustration">
            </div>
            <div class="header-text">
                <h2>Get in Touch</h2>
                <p>We're here to help you with Your income tax returns</p>
            </div>
        </div>

        <div class="contact-info">
            <!-- Call Us -->
            <a href="tel:+91 8926-130-200" class="info-box">
                <i class="bi bi-telephone"></i>
                <div>
                    <h6>Call Us:</h6>
                    <p>+91-XXX-XXXXX</p>
                </div>
            </a>

            <!-- Email Us -->
            <a href="mailto:rksmnu@gmail.com" class="info-box">
                <i class="bi bi-envelope"></i>
                <div>
                    <h6>Email Us:</h6>
                    <p>rksmnu@gmail.com</p>
                </div>
            </a>

            <!-- Visit Us -->
            <a href="https://www.google.com/maps/search/123+Digital+Lane,+Tax+Plaza,+New+Delhi,+India" target="_blank" class="info-box">
                <i class="bi bi-geo-alt"></i>
                <div>
                    <h6>Visit Us:</h6>
                    <p>123 Digital Lane, Tax Plaza, New Delhi, India</p>
                </div>
            </a>
        </div>



        <div class="row mt-4 align-items-start">
            <!-- ✅ Left Column: Map + Social Links -->
            <div class="col-md-4 d-flex flex-column align-items-start">
                <div class="map-box mb-4 w-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=YOUR_MAP_CODE"
                        width="100%"
                        height="250"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Social Links -->
                <div class="social-links d-flex gap-3 fs-4 align-items-center">
                    <span>Follow Us:</span>
                    <a href="https://www.facebook.com/profile.php?id=61556642542120&mibextid=ZbWKwL" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://x.com/capitaltaxplus?t=Kc6_1TNaw6DYo-oj6Gkr6A&s=09" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/capitaltaxplus?utm_source=qr&igsh=a3JxdHEwaHljaXZj" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <!-- <a href="https://www.linkedin.com/in/capital-taxplus-8ba06a2b4?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-linkedin"></i>
                    </a> -->
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <form action="{{ url('send') }}" method="POST" class="contact-form">
                    @csrf
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="input-group">
                        <span class="input-label">Name :</span>
                        <input type="text" name="name" id="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="input-group">
                        <span class="input-label">Email :</span>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    </div>

                    <div class="input-group">
                        <span class="input-label">Mobile :</span>
                        <input type="tel" name="mobile" id="mobile" placeholder="Enter your mobile number" required pattern="[0-9]{10}">
                    </div>

                    <div class="input-group">
                        <span class="input-label">Subject :</span>
                        <input type="subject" name="subject" id="subject" placeholder="Enter your subject" required>
                    </div>

                    <div class="input-group">
                        <span class="input-label">Message :</span>
                        <textarea name="message" id="message" rows="4" placeholder="Type your message" required></textarea>
                    </div>

                    <div class="button-group">
                        <button type="submit">Send Message</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endsection