@extends('layouts.app')

@push('styles')
@vite(['resources/css/user/about.css'])
@endpush

@section('content')
<!-- Hero Section -->
<!-- <section class="hero" style="background: url('{{ asset('images/about-us.jpg') }}') center/cover no-repeat;"> -->
<section class="hero">
    <div class="container text-center">
        <h1>About Us</h1>
    </div>
</section>

<!-- About Info Section -->
<section class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/About-Us.png') }}" class="img-fluid rounded about-info-image" alt="">
        </div>
        <div class="col-md-6">
            <h2 class="section-title mb-3">About Us</h2>
            <p>We provide expert consulting services tailored to help your business grow and succeed in a competitive environment.</p>
            <div class="d-flex align-items-center mt-4">
                <div class="text-center me-4">
                    <h3 class="text-primary">680+</h3>
                    <p>Business Tools</p>
                </div>
                <div>
                    <h3 class="text-primary">15+</h3>
                    <p>Years of Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="vision-mission-wrapper">
    <!-- <div class="vision-mission-bg" style="background: linear-gradient(to right, #003b83 40%, transparent 40%), 
                url('{{ asset('images/about-hand.png') }}') right center / cover no-repeat;"> -->
    <div class="vision-mission-bg">
        <div class="overlay"></div>
        <div class="container text-center text-white position-relative">
            <div class="section-header mb-5">
                <h6 class="sub-title">OUR MISSION & VISION</h6>
                <h2 class="main-title">Discover The Core Principles That Guide Us</h2>
            </div>

            <div class="row align-items-center justify-content-center">
                <!-- Left Image / Video -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="video-thumbnail position-relative">
                        <img src="{{ asset('images/about-mission.png') }}"
                            alt="Video Thumbnail" class="img-fluid rounded">
                        <!-- <div class="play-btn">
                            <i class="bi bi-play"></i>
                        </div> -->
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="vm-card">
                        <div class="icon-box">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h5 class="section-title">Our Vision</h5>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="col-md-4">
                    <div class="vm-card">
                        <div class="icon-box">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="section-title">Our Mission</h5>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container text-center">
        <h2 class="section-title mb-4">Discover Our Team Of Head Business Consultant Experts</h2>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-circle mb-3" alt="">
                <h6>John Doe</h6>
                <p class="text-muted">Senior Consultant</p>
            </div>
            <div class="col-md-3">
                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-circle mb-3" alt="">
                <h6>Jane Smith</h6>
                <p class="text-muted">Business Strategist</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container text-center">
        <h2>Let’s Discuss Your Business Goals & Schedule A Free Consultation Today</h2>
        <a href="/contact" class="btn btn-light mt-3">Contact Us</a>
    </div>
</section>

@endsection