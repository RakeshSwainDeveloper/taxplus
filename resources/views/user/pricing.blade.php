@extends('layouts.app')

@push('styles')
@vite(['resources/css/user/pricing.css'])
@endpush

@section('content')
<!-- <div class="pricing-page" style="
    background: radial-gradient(circle at top left, rgba(238,239,241,0.4), rgba(167,172,181,0.6)),
                url('{{ asset('images/pricing-back.jpg') }}') no-repeat center center/cover; background-attachment: fixed;"> -->
<div class="pricing-page">
    <div class="container">

        <!-- Page Header -->
        <div class="pricing-header text-center">
            <h2>ITR FILING</h2>
            <p>File your Income Tax Returns quickly and accurately with our expert assistance and easy-to-use platform.</p>
        </div>

        <!-- ✅ Row 1 -->
        <div class="pricing-container">
            <div class="pricing-box">
                <h3>Salary & HP Plan</h3>
                <div class="price">₹799 <span>/year</span></div>
                <ul>
                    <li>✔ Single & Multiple Employers</li>
                    <li>✔ Single & Multiple House Property</li>
                    <li>✔ Income from Other Sources</li>
                    <li>✔ Agriculture Income</li>
                </ul>
                <a href="#" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box popular">
                <span class="tag">Popular</span>
                <h3>Business & Professional Plan</h3>
                <div class="price">₹1499 <span>/year</span></div>
                <ul>
                    <li>✔ Single & Multiple Employers</li>
                    <li>✔ Single & Multiple House Property</li>
                    <li>✔ Business & Professional Income</li>
                    <li>✔ Income from Other Sources</li>
                    <li>✔ Agriculture Income</li>
                </ul>
                <a href="#" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>Capital Gain Plan</h3>
                <div class="price">₹1999 <span>/year</span></div>
                <ul>
                    <li>✔ Single & Multiple Employers</li>
                    <li>✔ Single & Multiple House Property</li>
                    <li>✔ Multiple Capital Gain Income</li>
                    <li>✔ Business & Professional Income</li>
                    <li>✔ Income from Other Sources</li>
                    <li>✔ Agriculture Income</li>
                </ul>
                <a href="#" class="pricing-btn">Get Started</a>
            </div>
        </div>

        <!-- ✅ Row 2 (new 3 boxes) -->
        <div class="pricing-container mt-5">
            <div class="pricing-box">
                <h3>Startup Plan</h3>
                <div class="price">₹999 <span>/year</span></div>
                <ul>
                    <li>✔ Basic Business Registration</li>
                    <li>✔ GST Filing Assistance</li>
                    <li>✔ Income Tax Filing</li>
                    <li>✔ Dedicated Support</li>
                </ul>
                <a href="#" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>Premium Plan</h3>
                <div class="price">₹2499 <span>/year</span></div>
                <ul>
                    <li>✔ Priority Support</li>
                    <li>✔ Tax Planning Consultation</li>
                    <li>✔ Audit Report Review</li>
                    <li>✔ Free Document Storage</li>
                </ul>
                <a href="#" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>Enterprise Plan</h3>
                <div class="price">₹4999 <span>/year</span></div>
                <ul>
                    <li>✔ End-to-End Compliance</li>
                    <li>✔ Dedicated Tax Expert</li>
                    <li>✔ Unlimited Filings</li>
                    <li>✔ 24/7 Support</li>
                </ul>
                <a href="#" class="pricing-btn">Get Started</a>
            </div>
        </div>
        <!-- ✅ TAX PLANNING SECTION -->
        <div class="tax-planning-section text-center mt-5">
            <h2>TAX PLANNING</h2>
            <p class="section-description">
                Discover personalized tax-saving strategies and optimize your tax liability with our expert planning services.
            </p>

            <div class="tax-card-container">
                <div class="tax-card">
                    <span class="tax-tag">FREE</span>
                    <h3>Tax Planning (DIY)</h3>
                    <div class="tax-price">FREE</div>
                    <ul>
                        <li>✔ Maximize your financial potential with <strong>Capital Tax Plus</strong>.</li>
                        <li>✔ Your exclusive access to tax planning.</li>
                    </ul>
                    <a href="#" class="tax-btn">Get Started</a>
                </div>
            </div>
        </div>
        <!-- ✅ GST PLANNING SECTION -->
        <div class="gst-planning-section text-center mt-5">
            <h2>GST PLANNING</h2>
            <p class="section-description">
                Easily file GST returns, stay compliant, and get professional help for seamless Goods & Services Tax management.
            </p>

            <div class="pricing-container">
                <div class="pricing-box">
                    <h3>GST Registration</h3>
                    <div class="price">₹1499</div>
                    <ul>
                        <li>✔ Application for GST Registration</li>
                        <li>✔ Application for Clarification</li>
                        <li>✔ Any modification in GST Registration Application</li>
                    </ul>
                    <a href="#" class="pricing-btn">Get Started</a>
                </div>
                <div class="pricing-box">
                    <span class="tag">Online Seller</span>
                    <h3>GST Compliances of Online Seller</h3>
                    <div class="price">₹10,199 <span>/year</span></div>
                    <ul>
                        <li>✔ GSTR-1 Return Filing</li>
                        <li>✔ GSTR-3B Return Filing</li>
                        <li>✔ Credit Reconciliation (Reconciliation of Purchase Register and GSTR-2A)</li>
                        <li>❌ Excludes Annual Return</li>
                    </ul>
                    <a href="#" class="pricing-btn">Get Started</a>
                </div>
                <div class="pricing-box">
                    <h3>GST Compliances for Freelancers</h3>
                    <div class="price">₹6799 <span>/year</span></div>
                    <ul>
                        <li>✔ GSTR-1 Return Filing</li>
                        <li>✔ GSTR-3B Return Filing</li>
                        <li>✔ Credit Reconciliation (Reconciliation of Purchase Register and GSTR-2A)</li>
                        <li>❌ Excludes Annual Return</li>
                    </ul>
                    <a href="#" class="pricing-btn">Get Started</a>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection