@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home page')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    @vite(['resources/css/user/home.css'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

@section('content')
<section id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <!-- 🔘 Carousel Indicators (Dots) -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- 🔄 Carousel Inner -->
    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero d-flex align-items-center justify-content-center">
                <div class="hero-text">
                    <h1>File your ITR with ease</h1>
                    <p>We provide easy and affordable ITR filing services.</p>
                    <a href="#" class="btn-primary">Get Started</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="ITR Illustration 1">
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="hero d-flex align-items-center justify-content-center">
                <div class="hero-text">
                    <h1>Fast and Secure Tax Filing</h1>
                    <p>Experience hassle-free and confidential filing with our experts.</p>
                    <a href="#" class="btn-primary">Learn More</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="ITR Illustration 2">
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="hero d-flex align-items-center justify-content-center">
                <div class="hero-text">
                    <h1>Affordable Plans for Everyone</h1>
                    <p>Choose a plan that suits your needs and budget.</p>
                    <a href="#" class="btn-primary">View Plans</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="ITR Illustration 3">
                </div>
            </div>
        </div>

    </div>

    <!-- ◀️▶️ Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>




<section class="how-it-works">
    <h2>How it works</h2>
    <div class="steps">
        <div class="step">
            <h3>1. Enter your details</h3>
            <p>Review all your cases</p>
        </div>
        <div class="step">
            <h3>2. Verify your information</h3>
            <p>Review your accounts</p>
        </div>
        <div class="step">
            <h3>3. File your ITR</h3>
            <p>Secure and confidential</p>
        </div>
    </div>
</section>

<section class="why-choose">
    <h2>Why choose us</h2>
    <div class="features">
        <div class="feature">Experienced Professionals</div>
        <div class="feature">Accurate and Reliable</div>
        <div class="feature">Secure and Credential</div>
    </div>
</section>

<section class="pricing">
    <h2>Services</h2>
    <div class="plans">
        <div class="plan">
            <h3>ITR Filing</h3>
            <p>$10/mo</p>
            <a href="#" class="btn-plan">Choose Plan</a>
        </div>
        <div class="plan">
            <h3>Standard</h3>
            <p>$20/mo</p>
            <a href="#" class="btn-plan">Choose Plan</a>
        </div>
        <div class="plan">
            <h3>Premium</h3>
            <p>$30/mo</p>
            <a href="#" class="btn-plan">Choose Plan</a>
        </div>
    </div>
</section>

<section class="testimonials">
    <h2>Testimonials</h2>
    <blockquote>
        "The best tax filing service I've used. The process was simple and the support team was very helpful."
    </blockquote>
</section>
@endsection