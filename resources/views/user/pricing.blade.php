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
                <h3>Salary</h3>
                <div class="price">₹799 <span>/year</span></div>
                <ul>
                    <li>✔ Single & Multiple Employers</li>
                    <li>✔ Single & Multiple House Property</li>
                    <li>✔ Income from Other Sources</li>
                    <li>✔ Agriculture Income</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 1]) }}" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box popular">
                <span class="tag">Popular</span>
                <h3>Income/ Loss from House Property</h3>
                <div class="price">₹799 <span>/year</span></div>
                <ul>
                    <li>✔ Single & Multiple Employers</li>
                    <li>✔ Single & Multiple House Property</li>
                    <li>✔ Business & Professional Income</li>
                    <li>✔ Income from Other Sources</li>
                    <li>✔ Agriculture Income</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 2]) }}" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>Capital Gain Income/Loss</h3>
                <div class="price">₹1999 <span>/year</span></div>
                <ul>
                    <li>✔ Single & Multiple Employers</li>
                    <li>✔ Single & Multiple House Property</li>
                    <li>✔ Multiple Capital Gain Income</li>
                    <li>✔ Business & Professional Income</li>
                    <li>✔ Income from Other Sources</li>
                    <li>✔ Agriculture Income</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 3]) }}" class="pricing-btn">Get Started</a>
            </div>
        </div>

        <!-- ✅ Row 2 (new 3 boxes) -->
        <div class="pricing-container mt-5">
            <div class="pricing-box">
                <h3>Income/Loss from Business and Profession</h3>
                <div class="price">₹1499 <span>/year</span></div>
                <ul>
                    <li>✔ Basic Business Registration</li>
                    <li>✔ GST Filing Assistance</li>
                    <li>✔ Income Tax Filing</li>
                    <li>✔ Dedicated Support</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 4]) }}" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>Future and Options</h3>
                <div class="price">₹2999 <span>/year</span></div>
                <ul>
                    <li>✔ Priority Support</li>
                    <li>✔ Tax Planning Consultation</li>
                    <li>✔ Audit Report Review</li>
                    <li>✔ Free Document Storage</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 5]) }}" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>Intra Day Trading</h3>
                <div class="price">₹2999 <span>/year</span></div>
                <ul>
                    <li>✔ End-to-End Compliance</li>
                    <li>✔ Dedicated Tax Expert</li>
                    <li>✔ Unlimited Filings</li>
                    <li>✔ 24/7 Support</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 6]) }}" class="pricing-btn">Get Started</a>
            </div>
        </div>
        <!-- ✅ Row 3 (new 3 boxes) -->
        <div class="pricing-container mt-5">
            <div class="pricing-box">
                <h3>Crypto Currency Trading</h3>
                <div class="price">₹3999 <span>/year</span></div>
                <ul>
                    <li>✔ Basic Business Registration</li>
                    <li>✔ GST Filing Assistance</li>
                    <li>✔ Income Tax Filing</li>
                    <li>✔ Dedicated Support</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 7]) }}" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>Residents having Foregin Income</h3>
                <div class="price">₹3999 <span>/year</span></div>
                <ul>
                    <li>✔ Priority Support</li>
                    <li>✔ Tax Planning Consultation</li>
                    <li>✔ Audit Report Review</li>
                    <li>✔ Free Document Storage</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 8]) }}" class="pricing-btn">Get Started</a>
            </div>
            <div class="pricing-box">
                <h3>NRI's having Indian Income</h3>
                <div class="price">₹3999 <span>/year</span></div>
                <ul>
                    <li>✔ End-to-End Compliance</li>
                    <li>✔ Dedicated Tax Expert</li>
                    <li>✔ Unlimited Filings</li>
                    <li>✔ 24/7 Support</li>
                </ul>
                <a href="{{ route('user.itr-filing', ['step' => 2, 'plan_id' => 9]) }}" class="pricing-btn">Get Started</a>
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