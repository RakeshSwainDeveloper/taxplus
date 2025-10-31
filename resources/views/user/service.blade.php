@extends('layouts.app')

@push('styles')
@vite(['resources/css/user/service.css'])
@endpush

@section('content')
<!-- Hero Section -->
<section class="service-hero">
    <div class="hero-top">
        <div class="overlay"></div>

        <div class="container text-center">
            <h1 class="fw-bold mb-2 text-white">OUR SERVICES</h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <h2 class="fw-bold text-teal">We have over 10 years of experience.</h2>
            </div>
            <div class="col-md-6">
                <p class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit sed diam nonummy nibh euismod
                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim minim veniam, quis
                    nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat
                    autem vel eum iriure dolor.
                </p>
            </div>
        </div>
    </div>
</section>



<!-- What We Do -->
<section class="extra-services py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h4 class="section-title">Service we provide</h>
                <h2 class="section-subtitle">WHAT WE DO FOR YOU</h2>
        </div>

        <div class="row g-4">
            <!-- 01 -->
            <div class="col-md-4">
                <a href="{{ url('services') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-teal text-white h-100">
                        <div class="number-circle">01.</div>
                        <h4 class="fw-bold mt-3">ITR FILING</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 02 -->
            <div class="col-md-4">
                <a href="{{ url('services') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-darkblue text-white h-100">
                        <div class="number-circle">02.</div>
                        <h4 class="fw-bold mt-3">GST</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 03 -->
            <div class="col-md-4">
                <a href="{{ url('services') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-teal text-white h-100">
                        <div class="number-circle">03.</div>
                        <h4 class="fw-bold mt-3">TDS</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 04 -->
            <div class="col-md-4">
                <a href="{{ url('services') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-darkblue text-white h-100">
                        <div class="number-circle">04.</div>
                        <h4 class="fw-bold mt-3">TAX RETURN</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 05 -->
            <div class="col-md-4">
                <a href="{{ url('services') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-teal text-white h-100">
                        <div class="number-circle">05.</div>
                        <h4 class="fw-bold mt-3">TAX PLANNING</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 06 -->
            <div class="col-md-4">
                <a href="{{ url('services') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-darkblue text-white h-100">
                        <div class="number-circle">06.</div>
                        <h4 class="fw-bold mt-3">TAX CONSULTANCY</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Popular Services -->
<section class="popular-services py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h4 class="section-title">Service we provide</h4>
            <h2 class="section-subtitle">OUR POPULAR SERVICES</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4 d-flex">
                <div class="card border-0 shadow-sm flex-fill">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('images/about-mission.png') }}" class="card-img-top service-img" alt="Financial Planning">
                        <div class="service-label">
                            <span>Financial Planning</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="text-primary fw-bold">Continue Reading →</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="card border-0 shadow-sm flex-fill">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('images/about-us.jpg') }}" class="card-img-top service-img" alt="Investment Advisor">
                        <div class="service-label">
                            <span>Investment Advisor</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="text-primary fw-bold">Continue Reading →</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="card border-0 shadow-sm flex-fill">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('images/pricing.png') }}" class="card-img-top service-img" alt="Saving Money">
                        <div class="service-label">
                            <span>Saving Money</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="text-primary fw-bold">Continue Reading →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection