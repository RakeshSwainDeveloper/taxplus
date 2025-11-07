@extends('layouts.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
@vite(['resources/css/user/home.css'])
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
<section id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <!-- Dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero" style="background: url('{{ asset('images/pricing-back.jpg') }}') no-repeat center center/cover;">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>File your ITR with ease</h1>
                        <p>We provide easy and affordable ITR filing services.</p>
                        <a href="#" class="btn-slide">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('{{ asset('images/ITR-filing.png') }}') no-repeat center center/cover;">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>Fast and Secure Tax Filing</h1>
                        <p>Experience hassle-free and confidential filing with our experts.</p>
                        <a href="#" class="btn-slide">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('{{ asset('images/image-6.png') }}') no-repeat center center/cover;">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>Affordable Plans for Everyone</h1>
                        <p>Choose a plan that suits your needs and budget.</p>
                        <a href="#" class="btn-slide">View Plans</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

<section class="accountant-help">
    <h2>How Can an <span>Accountant</span> Help You?</h2>
    <p class="intro-text">
        Objectively innovate empowered manufactured products whereas parallel platforms.
        Holistically predominate extensible testing procedures for reliable supply chains.
    </p>

    <div class="help-cards">
        <div class="help-card">
            <i class="bi bi-cash-stack icon"></i>
            <h3>Financial Services</h3>
            <p>Engage worldwide methodologies with web-enabled technology.</p>
            <a href="#" class="btn-read">Read More</a>
        </div>

        <div class="help-card">
            <i class="bi bi-graph-up icon"></i>
            <h3>Business Valuation</h3>
            <p>Pursue scalable customer service through sustainable potentials.</p>
            <a href="#" class="btn-read">Read More</a>
        </div>

        <div class="help-card">
            <i class="bi bi-receipt icon"></i>
            <h3>Small Business Taxes</h3>
            <p>Administrate turnkey channels for virtual e-tailers.</p>
            <a href="#" class="btn-read">Read More</a>
        </div>

        <div class="help-card">
            <i class="bi bi-briefcase icon"></i>
            <h3>Startup Compliance</h3>
            <p>Empower researched growth strategies and internal interoperability.</p>
            <a href="#" class="btn-read">Read More</a>
        </div>
    </div>
</section>

<section class="why-choose-modern">
    <div class="container">
        <div class="why-left">
            <h5>— WHY CHOOSE US</h5>
            <h2>Custom IT Solutions for Your Business</h2>
            <p>
                We provide scalable and secure IT services designed to meet your business goals.
                Our expert team ensures innovative, reliable, and efficient technology solutions for growth.
            </p>
            <!-- <a href="#" class="video-btn">
                <i class="bi bi-play-circle"></i> Video Showcase
            </a> -->
        </div>

        <div class="why-right">
            <div class="card blue">
                <i class="bi bi-gear icon"></i>
                <h3>Experienced Professionals</h3>
                <p>Astonished set expression solicitude way admiration.</p>
            </div>
            <div class="card white">
                <i class="bi bi-cloud icon"></i>
                <h3>Accurate and Reliable</h3>
                <p>Astonished set expression solicitude way admiration.</p>
            </div>
            <div class="card white">
                <i class="bi bi-globe icon"></i>
                <h3>Secure and Credentials</h3>
                <p>Astonished set expression solicitude way admiration.</p>
            </div>
            <div class="card blue">
                <i class="bi bi-hdd-network icon"></i>
                <h3>Backup & Recovery</h3>
                <p>Astonished set expression solicitude way admiration.</p>
            </div>
        </div>
    </div>
</section>

<!-- <section class="our-services-clean">
    <div class="container">
        <h2>OUR <span>SERVICES</span></h2>
        <p class="services-description">
            Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables
            for real-time schema. Dramatically maintain click-and-mortar solutions without functional solutions.
        </p>

        <div class="services-items">
            <div class="service-item">
                <i class="bi bi-cash-coin icon"></i>
                <h3>INVESTMENT PLANNING</h3>
                <p>Completely synergize resource taxing relations premier niche markets. Professionally cultivate service with robust ideas.</p>
                <a href="/service" class="read-more">Read More ›</a>
            </div>

            <div class="service-item">
                <i class="bi bi-calendar-check icon"></i>
                <h3>RETIREMENT PLANNING</h3>
                <p>Completely synergize resource taxing relations premier niche markets. Professionally cultivate service with robust ideas.</p>
                <a href="/service" class="read-more">Read More ›</a>
            </div>

            <div class="service-item">
                <i class="bi bi-person-workspace icon"></i>
                <h3>LAWYER CONSULTING</h3>
                <p>Completely synergize resource taxing relations premier niche markets. Professionally cultivate service with robust ideas.</p>
                <a href="/service" class="read-more">Read More ›</a>
            </div>

            <div class="service-item">
                <i class="bi bi-receipt icon"></i>
                <h3>TAXATION</h3>
                <p>Completely synergize resource taxing relations premier niche markets. Professionally cultivate service with robust ideas.</p>
                <a href="/service" class="read-more">Read More ›</a>
            </div>

            <div class="service-item">
                <i class="bi bi-shield-check icon"></i>
                <h3>RISK MANAGEMENT</h3>
                <p>Completely synergize resource taxing relations premier niche markets. Professionally cultivate service with robust ideas.</p>
                <a href="/service" class="read-more">Read More ›</a>
            </div>

            <div class="service-item">
                <i class="bi bi-bar-chart-line icon"></i>
                <h3>BUSINESS PLANNING</h3>
                <p>Completely synergize resource taxing relations premier niche markets. Professionally cultivate service with robust ideas.</p>
                <a href="/service" class="read-more">Read More ›</a>
            </div>
        </div>
    </div>
</section> -->

<section class="our-services-clean">
    <div class="container">
        <h2>OUR <span>SERVICES</span></h2>
        <p class="services-description">
            Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables
            for real-time schema. Dramatically maintain click-and-mortar solutions without functional solutions.
        </p>

        <div class="services-items">
            <!-- Show only 3 service cards -->
            <div class="service-item">
                <i class="bi bi-cash-coin icon"></i>
                <h3>ITR FILING</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                <a href="{{ route('user.itr-filing') }}" class="read-more">Read More ›</a>
            </div>

            <div class="service-item">
                <i class="bi bi-calendar-check icon"></i>
                <h3>GST</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                <a href="{{ route('user.gst-filing') }}" class="read-more">Read More ›</a>
            </div>

            <div class="service-item">
                <i class="bi bi-person-workspace icon"></i>
                <h3>TDS</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                <a href="/service" class="read-more">Read More ›</a>
            </div>
        </div>

        <!-- Show More Button -->
        <div class="show-more-container">
            <a href="/service" class="btn-show-more">
                Show More <span class="loading-dots"></span>
            </a>
        </div>
    </div>
</section>


<section class="testimonials">
    <h2>What Our Users Say</h2>
    <div class="reviews">
        <div class="review">
            <img src="{{ asset('images/image-6.png') }}" alt="User 1">
            <h3>Rahul Mehta</h3>
            <p class="stars">★★★★★</p>
            <blockquote>
                “The best tax filing service I’ve ever used! Super simple and quick.”
            </blockquote>
        </div>
        <div class="review">
            <img src="{{ asset('images/image-9.png') }}" alt="User 2">
            <h3>Priya Sharma</h3>
            <p class="stars">★★★★☆</p>
            <blockquote>
                “Very helpful and responsive support team. Filing was smooth and easy.”
            </blockquote>
        </div>
        <div class="review">
            <img src="{{ asset('images/image-6.png') }}" alt="User 3">
            <h3>Rohit Verma</h3>
            <p class="stars">★★★★★</p>
            <blockquote>
                “Affordable and reliable — I’ll definitely use it again next year!”
            </blockquote>
        </div>
    </div>
</section>
@endsection