@extends('layouts.app')

@push('styles')
<style>
    /* Smooth gradient header */
    .gst-header {
        background: linear-gradient(135deg, #006d6d, #009cc0);
    }

    .gst-card {
        border-radius: 18px;
        transition: all 0.3s ease-in-out !important;
    }

    .gst-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .gst-card-body {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .gst-card-body .btn {
        margin-top: auto;
    }

    .gst-card .btn:hover {
        opacity: 0.9;
    }

    .btn-outline-gst {
        border: 2px solid #00a38d !important;
        color: #00a38d !important;
        border-radius: 10px;
        transition: 0.3s ease;
    }

    .btn-outline-gst:hover {
        background: #a4e7dfff !important;
        color: #fff !important;
        box-shadow: 0 0 10px rgba(0, 163, 141, 0.4);
    }
</style>
@endpush

@section('content')

<!-- ======================== HEADER SECTION ======================== -->
<section class="w-100" style="background: linear-gradient(135deg, #016b69, #009bc0); padding:90px 0;">
    <div class="container text-center text-white">
        <h1 class="fw-bold display-4">Your GST Compliance Partner</h1>

        <p class="mt-3 fs-5">
            Seamless registration, timely filing, and expert consultation for Goods and Services Tax.
        </p>

        <a href="#plans" class="btn btn-light btn-lg mt-4 px-4 py-2">
            Explore GST Plans
        </a>
    </div>
</section>

<!-- ======================== SERVICE PLANS ======================== -->
<section id="plans" class="py-5" style="background:#f3f8fc;">
    <div class="container">

        <!-- Section Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold fs-2" style="color:#036c5f;">Our GST Service Plans</h2>
            <div style="width:80px;height:3px;background:#00a38d;margin:10px auto;border-radius:10px;"></div>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- GST Registration -->
            <div class="col-md-4">
                <div class="card shadow border-0 h-100 gst-card"
                    style="border-top:4px solid #00a38d !important;">

                    <div class="card-body p-4 gst-card-body">

                        <img src="https://cdn-icons-png.flaticon.com/512/921/921347.png"
                            width="45" class="mb-2">

                        <h4 class="fw-bold">GST Registration</h4>

                        <p class="text-muted mt-2">
                            Obtain your GSTIN quickly and efficiently. Required for all eligible businesses.
                        </p>

                        <ul class="list-unstyled text-muted">
                            <li>✔ New GSTIN Application</li>
                            <li>✔ Verification & Follow-up</li>
                        </ul>

                        <!-- FIXED PRICE SPACING -->
                        <h3 class="fw-bold text-success mt-3 mb-4">₹ 1,999</h3>

                        <button class="btn w-100" style="background:#008f79;color:white;">
                            Select Plan
                        </button>
                    </div>

                </div>
            </div>



            <!-- Quarterly Filing -->
            <div class="col-md-4">
                <div class="card shadow border-0 h-100 gst-card"
                    style="border-top:4px solid #00a38d !important;">

                    <div class="card-body p-4 gst-card-body">

                        <img src="https://cdn-icons-png.flaticon.com/512/2989/2989849.png"
                            width="45" class="mb-2">

                        <h4 class="fw-bold">Quarterly Filing (GSTR-3B & GSTR-1)</h4>

                        <p class="text-muted mt-2">
                            Ideal for businesses opting for Quarterly Return Filing and Monthly Payment.
                        </p>

                        <ul class="list-unstyled text-muted">
                            <li>✔ 4 × GSTR-3B Filings</li>
                            <li>✔ 4 × GSTR-1 Filings</li>
                            <li>✔ Monthly Support</li>
                        </ul>

                        <!-- FIXED PRICE SPACING -->
                        <h3 class="fw-bold text-success mt-3 mb-4">₹ 4,999 / Year</h3>

                        <button class="btn w-100" style="background:#008f79;color:white;">
                            Select Plan
                        </button>
                    </div>

                </div>
            </div>



            <!-- Annual Compliance -->
            <div class="col-md-4">
                <div class="card shadow border-0 h-100 gst-card"
                    style="border-top:4px solid #00a38d !important;">

                    <div class="card-body p-4 gst-card-body">

                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png"
                            width="45" class="mb-2">

                        <h4 class="fw-bold">Comprehensive Annual Compliance</h4>

                        <p class="text-muted mt-2">
                            Full package including monthly/quarterly filings and annual reconciliation.
                        </p>

                        <ul class="list-unstyled text-muted">
                            <li>✔ Monthly / Quarterly Filings</li>
                            <li>✔ Annual Reconciliation (GSTR-9)</li>
                        </ul>

                        <!-- FIXED PRICE SPACING -->
                        <h3 class="fw-bold text-success mt-3 mb-4">Custom Quote</h3>

                        <button class="btn w-100" style="background:#008f79;color:white;">
                            Request Quote
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>


<!-- ======================== DOCUMENTS REQUIRED ======================== -->
<section class="py-5 bg-white">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color:#036c5f;">Documents Required</h2>
            <div style="width:80px;height:3px;background:#00a38d;margin:10px auto;border-radius:10px;"></div>

            <p class="text-muted mt-3" style="max-width:800px;margin:auto;">
                To start any GST service, please be ready with the following documents.
                The exact requirements may vary based on your service choice.
            </p>
        </div>

        <div class="row g-4 justify-content-center mt-4">

            <!-- Business Identity Proof -->
            <div class="col-md-4">
                <div class="p-4 shadow-sm bg-white rounded"
                    style="border-left:4px solid #0d6efd; border-radius:12px;">

                    <h5 class="fw-bold" style="color:#0d6efd;">Business Identity Proof</h5>

                    <ul class="mt-3 text-muted">
                        <li><strong>PAN Card</strong> of the Applicant/Business</li>
                        <li><strong>Aadhaar Card</strong> (for Proprietor/Partners/Directors)</li>
                        <li><strong>MOA / Partnership Deed</strong> (if applicable)</li>
                    </ul>
                </div>
            </div>

            <!-- Principal Place of Business -->
            <div class="col-md-4">
                <div class="p-4 shadow-sm bg-white rounded"
                    style="border-left:4px solid #0d6efd; border-radius:12px;">

                    <h5 class="fw-bold" style="color:#0d6efd;">Principal Place of Business Proof</h5>

                    <ul class="mt-3 text-muted">
                        <li><strong>Electricity Bill / Rent Agreement</strong> (most recent)</li>
                        <li><strong>NOC</strong> from owner (if rented/leased)</li>
                        <li><strong>Property Tax Receipt</strong> (if owned)</li>
                    </ul>

                </div>
            </div>

            <!-- Bank & Transaction Details -->
            <div class="col-md-4">
                <div class="p-4 shadow-sm bg-white rounded"
                    style="border-left:4px solid #0d6efd; border-radius:12px;">

                    <h5 class="fw-bold" style="color:#0d6efd;">Bank & Transaction Details</h5>

                    <ul class="mt-3 text-muted">
                        <li><strong>Cancelled Cheque</strong> / Bank Statement</li>
                        <li><strong>Sales & Purchase Invoices Data</strong></li>
                        <li><strong>Login Credentials</strong> (Portal access)</li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
</section>



<!-- ======================== READY TO START ======================== -->
<section class="py-5" style="background:#e6fafa;">
    <div class="container text-center">

        <h2 class="fw-bold" style="color:#036c5f;">Ready to Start?</h2>

        <p class="text-muted mt-2 mb-4" style="max-width:700px;margin:auto;">
            Click below to connect directly with a Tax Expert for a free consultation
            or to submit your documents.
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">

            <a href="#"
                class="btn btn-lg px-4 py-2"
                style="background:#008f79;color:white;border-radius:10px;">
                Chat With GST Expert Now
            </a>

            <a href="#" class="btn btn-lg px-4 py-2 btn-outline-gst">
                Upload Documents
            </a>


        </div>

    </div>
</section>


@endsection