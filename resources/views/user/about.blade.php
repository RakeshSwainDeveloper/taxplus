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

            <!-- Short Preview Text -->
            <p class="about-short">
                Welcome to Capital Taxplus (a unit of M/s Capital Group Ventures), your reliable partner in navigating
                the complexities of taxation with ease and expertise. Managing taxes can be a daunting task, and that’s
                where we come in. At Capital Taxplus, our team of seasoned professionals is committed to providing
                top-notch taxation services to ensure your financial well-being.
            </p>

            <!-- Full Content (Hidden Initially) -->
            <div class="about-more">

                <p><strong>Our Story:</strong><br>
                    We founded Capital Taxplus with a vision to simplify the intricate world of taxation. Our journey is
                    rooted in a passion for assisting individuals and businesses in achieving financial goals while staying
                    compliant with ever-evolving tax regulations.
                </p>

                <p><strong>What Sets Us Apart:</strong></p>

                <p><strong>Expertise:</strong><br>
                    Our team consists of skilled tax professionals with deep knowledge and experience. Whether you're an
                    individual, small business, or large corporation, we can handle your unique tax needs.
                </p>

                <p><strong>Client-Centric Approach:</strong><br>
                    At Capital Taxplus, clients are at the heart of everything we do. We build long-term relationships based
                    on trust, transparency, and personalized service. Your success is our priority.
                </p>

                <p><strong>Comprehensive Services:</strong><br>
                    From tax planning and preparation to compliance and consulting, we offer a wide range of services
                    designed to empower you with the tools and knowledge to make informed financial decisions.
                </p>

                <p><strong>Cutting-Edge Technology:</strong><br>
                    We embrace innovation and utilize modern technology to streamline the tax process, ensuring efficiency
                    and a hassle-free experience for our clients.
                </p>

                <p><strong>Ethical Practices:</strong><br>
                    Integrity is the foundation of our business. We follow the highest ethical standards, giving you peace of
                    mind that your finances are handled with honesty and professionalism.
                </p>

                <p>
                    At Capital Taxplus, we believe taxation doesn’t have to be a burden; it can be a strategic advantage.
                    Let us handle the complexities while you focus on growing your business and achieving your financial
                    goals.
                </p>
            </div>

            <!-- Read More Button -->
            <button class="read-more-btn mt-2" onclick="toggleAbout()">Read More</button>

            <!-- Stats -->
            <div class="stats-box d-flex align-items-start gap-5 mt-4">
                <div class="text-start">
                    <h3 class="text-primary">680+</h3>
                    <p>Business Tools</p>
                </div>
                <div class="text-start">
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
                <h6 class="sub-title">OUR VISION & MISSION</h6>
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
                <img src="{{ asset('images/co-founder.png') }}" class="img-fluid rounded-circle mb-3" alt="">
                <h6>Minati Prusty</h6>
                <p class="text-muted">Co-founder</p>
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
@push('scripts')
<script>
    function toggleAbout() {
        const moreText = document.querySelector('.about-more');
        const btn = document.querySelector('.read-more-btn');

        moreText.classList.toggle('open');

        btn.textContent = moreText.classList.contains('open') ?
            "Read Less" :
            "Read More";
    }
</script>
@endpush