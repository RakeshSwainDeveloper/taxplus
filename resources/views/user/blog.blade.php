@extends('layouts.app')

@push('styles')
@vite(['resources/css/user/blog.css'])
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
            <div class="hero" style="background: url('{{ asset('images/blog.png') }}') no-repeat center center/cover;">
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
            <div class="hero" style="background: url('{{ asset('images/blog-1.jpg') }}') no-repeat center center/cover;">
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
            <div class="hero" style="background: url('{{ asset('images/gst.jpg') }}') no-repeat center center/cover;">
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
<section class="blog-hero">
    <div class="container py-5 blog-layout">

        <div class="blog-main">
            <h1 class="blog-title">Our Latest Blogs</h1>

            @php
            $blogs = [
            [
            'title' => 'Importance of Filing Income Tax Return on Time',
            'category' => 'Income Tax',
            'image' => asset('images/pricing-back.jpg'),
            'excerpt' => 'Filing your ITR on time avoids penalties and helps in maintaining financial compliance...',
            'full_content' => 'Filing your Income Tax Return on time is crucial for financial compliance. Late filing may attract penalties and interest. Always ensure you report all income, claim eligible deductions, and double-check your forms before submission.',
            ],
            [
            'title' => 'GST Registration: Who Needs It and Why?',
            'category' => 'GST',
            'image' => asset('images/image-6.png'),
            'excerpt' => 'GST registration is mandatory for businesses crossing the threshold limit...',
            'full_content' => 'GST registration is required for businesses whose aggregate turnover exceeds the prescribed limit. It ensures legal compliance and enables you to claim input tax credit. Filing GST on time avoids penalties and legal complications.',
            ],
            [
            'title' => '10 Common Mistakes While Filing ITR',
            'category' => 'Income Tax',
            'image' => asset('images/pricing-back.jpg'),
            'excerpt' => 'Avoid these common mistakes that taxpayers often make...',
            'full_content' => 'Common mistakes while filing ITR include incorrect personal details, missing income sources, forgetting deductions, and late filing. Always review your tax forms carefully and maintain proper records to avoid errors and penalties.',
            ],
            ];
            @endphp


            <div class="blog-list">
                @foreach ($blogs as $post)
                <div class="blog-card">
                    <img src="{{ $post['image'] }}" class="blog-img" alt="{{ $post['title'] }}">

                    <div class="blog-content">
                        <span class="blog-category">{{ $post['category'] }}</span>

                        <h3 class="blog-heading">{{ $post['title'] }}</h3>

                        <p class="blog-excerpt">{{ $post['excerpt'] }}</p>

                        <p class="blog-full-content" style="display:none;">{{ $post['full_content'] }}</p>

                        <a href="javascript:void(0);" class="read-more" onclick="toggleReadMore(this)">Read More →</a>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

        <aside class="blog-sidebar">

            <div class="sidebar-box">
                <h3 class="sidebar-title">Search</h3>
                <input type="text" class="sidebar-input" placeholder="Search blog...">
            </div>

            <div class="sidebar-box">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="sidebar-list">
                    <li>Income Tax</li>
                    <li>GST</li>
                    <li>Finance</li>
                    <li>Business</li>
                </ul>
            </div>

            <div class="sidebar-box">
                <h3 class="sidebar-title">Recent Posts</h3>
                <ul class="sidebar-list">
                    <li>Importance of Filing ITR</li>
                    <li>GST Registration Steps</li>
                    <li>How to Avoid Tax Penalties</li>
                </ul>
            </div>

        </aside>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function toggleReadMore(element) {
        const content = element.previousElementSibling; // the full content
        const excerpt = content.previousElementSibling; // the excerpt
        if (content.style.display === "none") {
            content.style.display = "block";
            excerpt.style.display = "none";
            element.innerText = "Show Less ←";
        } else {
            content.style.display = "none";
            excerpt.style.display = "block";
            element.innerText = "Read More →";
        }
    }
</script>
@endpush