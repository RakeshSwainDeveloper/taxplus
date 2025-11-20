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
                <a href="{{ route('user.itr-filing') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-teal text-white h-100">
                        <div class="number-circle">01.</div>
                        <h4 class="fw-bold mt-3">ITR FILING</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>
            <!-- /gst-filing -->
            <!-- 02 -->
            <div class="col-md-4">
                <a href="{{ route('user.gst-filing') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-darkblue text-white h-100">
                        <div class="number-circle">02.</div>
                        <h4 class="fw-bold mt-3">GST SERVICES</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 03 -->
            <div class="col-md-4">
                <a href="{{ url('#') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-teal text-white h-100">
                        <div class="number-circle">03.</div>
                        <h4 class="fw-bold mt-3">PAN SERVICES</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 04 -->
            <div class="col-md-4">
                <a href="{{ url('#') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-darkblue text-white h-100">
                        <div class="number-circle">04.</div>
                        <h4 class="fw-bold mt-3">TDS / TCS FILING</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 05 -->
            <div class="col-md-4">
                <a href="{{ url('services') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-teal text-white h-100">
                        <div class="number-circle">05.</div>
                        <h4 class="fw-bold mt-3">TAX CONSULTATION</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed diam nonummy nibh euismod tincidunt laoreet dolore.</p>
                    </div>
                </a>
            </div>

            <!-- 06 -->
            <div class="col-md-4">
                <a href="{{ url('#') }}" class="text-decoration-none">
                    <div class="service-box p-4 text-center bg-darkblue text-white h-100">
                        <div class="number-circle">06.</div>
                        <h4 class="fw-bold mt-3">NOTICE HANDLING</h4>
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
                        <!-- <a href="#" class="text-primary fw-bold">Continue Reading →</a> -->
                        <a href="#" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#modalFinancialPlanning">
                            Continue Reading →
                        </a>
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
                        <!-- <a href="#" class="text-primary fw-bold">Continue Reading →</a> -->
                        <a href="#" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#modalInvestmentAdvisor">
                            Continue Reading →
                        </a>
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
                        <!-- <a href="#" class="text-primary fw-bold">Continue Reading →</a> -->
                        <a href="#" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#modalSavingPlanning">
                            Continue Reading →
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade myModal" id="modalFinancialPlanning" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Financial Planning</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- MODAL BODY -->
            <div class="modal-body">

                <p class="mt-3">
                    Saving money is the foundation of good financial health.Make savings a monthly expense. Now that you know what you spend in a month, you can begin to create a budget. Your budget should show what your expenses are relative to your income, so that you can plan your spending and limit overspending. Be sure to factor in expenses that occur regularly but not every month, such as car maintenance. Include a savings category in your budget and aim to save an amount that feels comfortable to you. Plan on eventually increasing your savings amount to up to 20 percent of your income.
                </p>

                <hr>

                <button class="btn btn-secondary mt-4" data-bs-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>


<div class="modal fade myModal" id="modalInvestmentAdvisor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Investment Advisor</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- MODAL BODY -->
            <div class="modal-body">

                <p class="mt-3">
                    Saving money is the foundation of good financial health.Make savings a monthly expense. Now that you know what you spend in a month, you can begin to create a budget. Your budget should show what your expenses are relative to your income, so that you can plan your spending and limit overspending. Be sure to factor in expenses that occur regularly but not every month, such as car maintenance. Include a savings category in your budget and aim to save an amount that feels comfortable to you. Plan on eventually increasing your savings amount to up to 20 percent of your income.
                </p>

                <hr>

                <button class="btn btn-secondary mt-4" data-bs-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>


<div class="modal fade myModal" id="modalSavingPlanning" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Saving Money</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- MODAL BODY -->
            <div class="modal-body">

                <p class="mt-3">
                    Saving money is the foundation of good financial health.Make savings a monthly expense. Now that you know what you spend in a month, you can begin to create a budget. Your budget should show what your expenses are relative to your income, so that you can plan your spending and limit overspending. Be sure to factor in expenses that occur regularly but not every month, such as car maintenance. Include a savings category in your budget and aim to save an amount that feels comfortable to you. Plan on eventually increasing your savings amount to up to 20 percent of your income.
                </p>

                <hr>

                <button class="btn btn-secondary mt-4" data-bs-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>

<!-- FAQ Section -->
<section class="faq-box-clean py-5">
    <div class="container">
        <div class="faq-clean-wrapper">
            <div class="faq-text">
                <h2>Frequently Asked Questions</h2>
                <p>Find quick answers to common tax, GST, and compliance questions.</p>
            </div>

            <div>
                <a href="{{ route('user.faq') }}" class="faq-clean-btn">
                    Explore FAQs →
                </a>
            </div>
        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="cta">
    <div class="container cta-flex">
        <div class="cta-image">
            <img src="{{ asset('images/contact-us.jpg') }}" alt="Business Illustration">
        </div>
        <div class="cta-text">
            <h2>Let’s Discuss Your Business Goals & Schedule a Free Consultation Today</h2>
        </div>
        <div class="cta-button">
            <a href="/contact" class="btn">Contact Us</a>
        </div>
    </div>
</section>
@endsection
<!-- ==========================
   SCRIPTS: TOOLTIP + POPOVER
=========================== -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Enable popovers
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function(el) {
            new bootstrap.Popover(el);
        });

        // Enable tooltips
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
            new bootstrap.Tooltip(el);
        });

    });
</script>
@endpush