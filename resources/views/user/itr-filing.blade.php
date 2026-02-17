@extends('layouts.app')

{{-- Use the new CSS file (Assuming the CSS in this file works and matches the styles mentioned) --}}
@push('styles')
@vite('resources/css/user/itr-filing.css')
@endpush

@section('content')
<div class="itr-container">

    <!-- Header & Title -->
    <div class="itr-header text-center mb-12">
        <h1 class="text-white">ITR FILING</h1>
        <p>Your Simplest Tax Filing Experience</p>
    </div>

    <!-- Step Indicator (Wizard Progress) -->
    <div class="step-indicator">
        <div class="step-line"></div>

        <!-- Step 1: Select Plan -->
        <div id="step-1-indicator" class="step-item">
            <div class="step-circle active" data-step="1">1</div>
            <span class="step-text active">Select Plan</span>
        </div>

        <!-- Step 2: Documents -->
        <div id="step-2-indicator" class="step-item">
            <div class="step-circle inactive" data-step="2">2</div>
            <span class="step-text inactive">Select Upload Method</span>
        </div>

        <!-- Step 3: Document Upload -->
        <div id="step-3-indicator" class="step-item">
            <div class="step-circle inactive" data-step="3">3</div>
            <span class="step-text inactive">Document Upload</span>
        </div>

        <!-- Step 3: Payment -->
        <div id="step-4-indicator" class="step-item">
            <div class="step-circle inactive" data-step="4">4</div>
            <span class="step-text inactive">Payment Link</span>
        </div>
    </div>


    <!-- STEP 1: Choose ITR Plan (Based on income source) -->
    <div id="step-1-content" class="space-y-6">
        <h2 class="text-3xl font-bold mb-8 text-center text-white">1. Choose the plan that matches your primary income source</h2>

        <div id="plan-grid" class="plan-grid">
            {{-- Plan Cards will be dynamically inserted by Laravel --}}
            @foreach ($plans as $plan)
            @php
            // Decode document_list which is a JSON string of features
            $features = $plan->document_list ?? ['Basic Filing', 'Expert Support'];
            $isHighlighted = in_array($plan->id, [4, 6]); // Example: highlight plan IDs 4 and 6
            @endphp
            {{-- FIX: Corrected onclick function call to pass values securely. --}}
            <div id="card-{{ $plan->id }}" onclick="selectPlan({{ $plan->id }}, '{{ addslashes($plan->income_source) }}', {{ $plan->price }}, event)" class="plan-card {{ $isHighlighted ? 'bg-indigo-900 border-indigo-600' : '' }}">

                @if ($isHighlighted)
                <span class="absolute top-0 right-0 mt-3 mr-4 px-3 py-1 bg-indigo-500 text-xs font-bold uppercase rounded-full tracking-wider">Comprehensive</span>
                @endif

                <h3 class="mb-1 {{ $isHighlighted ? 'text-indigo-300' : 'text-white' }}">{{ $plan->source_type }}</h3>
                {{-- Assuming income_source holds the detailed trigger text --}}
                <p class="trigger">{{ $plan->income_source }}</p>
                <p class="price mb-4 {{ $isHighlighted ? 'text-white' : 'text-gray-100' }}">₹ {{ number_format($plan->price, 0) }}</p>

                <ul class="space-y-3">
                    @foreach ($features as $feature)
                    <li class="flex items-start">
                        {{-- Icon placeholder (assuming your CSS/Vite setup includes Lucide icons or similar) --}}
                        <svg class="w-5 h-5 mr-2 text-green-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    {{-- FIX: Added event.stopPropagation() to prevent double selection when clicking the button --}}
                    <button type="button" onclick="event.stopPropagation(); selectPlan({{ $plan->id }}, '{{ addslashes($plan->income_source) }}', {{ $plan->price }}, event)">Select Plan</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center pt-8">
            <button id="step1-next-button" onclick="goToStep2()" class="btn-primary btn-disabled" disabled>
                Proceed to Documents &rarr;
            </button>
        </div>
    </div>


    <!-- STEP 2: Document Submission (Hidden by default) -->
    <div id="step-2-content" class="space-y-8 hidden max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-4 text-center text-white">2. Share Your Documents</h2>
        <p class="text-lg text-center text-gray-300">You selected the <span id="selected-plan-name-step2" class="text-indigo-400 font-bold"></span> plan. Please choose how you want to share the required documents, including PAN and Form-16/statements.</p>

        <div class="doc-payment-grid">

            <!-- Card 1: Email -->
            <button id="doc-email-btn" onclick="selectDocumentMethod('Email', this)" class="doc-button">
                {{-- Icon placeholder --}}
                <svg class="w-8 h-8 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 21h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                </svg>
                <span>Email Documents</span>
                <p>Send to our official email: <span class="text-green-400">support@capitaltaxplus.com</span></p>
            </button>

            <!-- Card 2: Cloud Upload -->
            <button id="doc-upload-btn" onclick="selectDocumentMethod('Upload', this)" class="doc-button">
                {{-- Icon placeholder --}}
                <svg class="w-8 h-8 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                    <path d="M12 12v9" />
                    <path d="m16 16-4 4-4-4" />
                </svg>
                <span>Secure Cloud Upload</span>
                <p>Upload directly to our encrypted storage link.</p>
            </button>

            <!-- Card 3: WhatsApp -->
            <button id="doc-whatsapp-btn" onclick="selectDocumentMethod('WhatsApp', this)" class="doc-button">
                {{-- Icon placeholder --}}
                <svg class="w-8 h-8 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7.9 20A10.1 10.1 0 0 0 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2 2 6.5 2 12c0 2.2.8 4.2 2.1 5.9L2 22l4.1-2.1z" />
                    <path d="m10 8 4 4-4 4" />
                </svg>
                <span>WhatsApp Chat</span>
                <p>Chat and share with our expert on: <span class="text-green-400">8926130200</span></p>
            </button>

        </div>
        <div class="flex justify-between pt-8">
            <button onclick="backToStep1()" class="btn-change">
                &larr; Change Plan
            </button>
            <button id="step2-next-button" onclick="goToStep3()" class="btn-primary btn-disabled" disabled>
                Proceed to Payment &rarr;
            </button>
        </div>
    </div>

    <!-- STEP 3: Payment Finalization (Hidden by default) -->
    <div id="step-3-content" class="space-y-6 hidden max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center text-white">3. Payment Finalization</h2>

        <div class="summary-card">
            <div class="flex justify-between items-center pb-4 border-b border-gray-700">
                <span class="text-xl font-semibold text-gray-300">Plan:</span>
                <span id="final-plan-name" class="text-2xl plan-name"></span>
            </div>
            <div class="flex justify-between items-center py-4 mb-6">
                <span class="text-xl font-semibold text-gray-300">Total Amount:</span>
                <span id="final-plan-price" class="text-3xl price-amount"></span>
            </div>
            <div class="mt-8">
                <h3 class="text-2xl font-semibold text-white mb-2">
                    Required Documents
                </h3>
                <p class="text-sm text-gray-400 mb-6">
                    Please upload clear copies of the following documents (PDF / JPG / PNG).
                </p>

                <div id="required-documents" class="space-y-4"></div>

            </div>
            <div id="upload-progress-wrapper" class="hidden mt-4">
                <div class="w-full bg-gray-700 rounded-full h-3 overflow-hidden">
                    <div id="upload-progress-bar"
                        class="bg-indigo-500 h-3 transition-all"
                        style="width: 0%"></div>
                </div>
                <p id="upload-progress-text" class="text-sm text-gray-300 mt-2 text-center">
                    Uploading...
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mt-8">

                <!-- Back Button -->
                <button
                    type="button"
                    onclick="backToStep2()"
                    class="w-full sm:w-1/2 px-6 py-3 text-sm font-medium text-gray-300 bg-gray-700 rounded-xl hover:bg-gray-600 transition duration-200">
                    ← Back to Documents
                </button>

                <!-- Upload Button -->
                <button
                    id="upload-submit-btn"
                    type="button"
                    onclick="uploadDocuments()"
                    class="w-full sm:w-1/2 px-6 py-3 font-semibold rounded-xl flex items-center justify-center gap-2 transition duration-200 upload-btn-primary"
                    disabled>
                    ⬆ Upload Documents & Proceed
                </button>

            </div>

        </div>

    </div>

    <!-- Confirmation Modal/Message (Overlay) -->
    <div id="confirmation-message" class="hidden fixed inset-0 z-50 bg-black bg-opacity-75 flex items-center justify-center transition-opacity duration-300">
        <div class="modal-content bg-gray-800 p-8 rounded-xl shadow-2xl text-center max-w-md w-full transform -translate-y-4 transition-transform duration-300">
            {{-- Icon placeholder --}}
            <svg class="w-16 h-16 mx-auto mb-4 text-green-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <path d="m9 11 3 3L22 4" />
            </svg>
            <h3 class="text-3xl font-bold text-white mb-3">Request Submitted!</h3>
            <p id="final-message-text" class="text-gray-300 mb-6 leading-relaxed">
                Thank you! We've received your plan and document sharing preference. We will send the secure payment link and begin your hassle-free ITR filing.
            </p>
            <button onclick="resetApp()" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 transition duration-200 shadow-lg">
                Start a New Filing
            </button>
        </div>
    </div>

    <!-- EMAIL FALLBACK MODAL -->
    <div id="email-fallback"
        class="hidden fixed inset-0 z-50 bg-black bg-opacity-70 flex items-center justify-center">

        <div class="bg-gray-800 p-6 rounded-xl shadow-xl max-w-md w-full text-center">
            <h3 class="text-xl font-bold text-white mb-3">
                Send Documents via Email
            </h3>

            <p class="text-gray-300 mb-4">
                If your email app did not open automatically, please send your documents manually to:
            </p>

            <p class="text-green-400 font-semibold text-lg mb-5">
                support@capitaltaxplus.com
            </p>

            <button onclick="closeEmailFallback()"
                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                OK
            </button>
        </div>
    </div>
    <!-- END EMAIL FALLBACK MODAL -->

    <div id="step-4-content" class="hidden max-w-6xl mx-auto px-4 py-12">

        <h2 class="text-3xl font-semibold text-center text-white mb-20">
            Complete your payment
        </h2>


        <div class="payment-wrapper">

            <!-- LEFT: SUMMARY -->
            <div class="payment-card payment-summary">
                <h3>Order summary</h3>

                <div class="summary-item">
                    <span class="label">Selected plan</span>
                    <span id="payment-plan-name" class="value"></span>
                </div>

                <div class="summary-item total">
                    <span class="label">Amount payable</span>
                    <span id="payment-plan-price" class="amount"></span>
                </div>

                <ul class="summary-points">
                    <li>Secure payment</li>
                    <li>No hidden charges</li>
                    <li>Invoice included</li>
                </ul>
            </div>

            <!-- RIGHT: PAYMENT -->
            <div class="payment-card payment-action">
                <h3>Pay securely</h3>
                <p class="subtext">
                    Pay using UPI, card or net banking
                </p>

                <button id="payment-link" class="pay-btn" onclick="showPaymentSuccess()">
                    Pay now
                </button>

            </div>

        </div>
    </div>

    <!-- FULL PAGE LOADER -->

    <div id="page-loader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <p id="loader-text">Preparing document upload...</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Laravel data passed from the Controller
    // Assuming $plans is passed as an associative array keyed by ID (keyBy('id'))
    const PLANS_DATA = @json($plans->keyBy('id'));
    const SUBMIT_URL = "{{ route('user.itr-filing.submit') }}";

    // --- State Variables ---
    let currentStep = 1;
    let selectedPlan = {
        id: null,
        name: null,
        price: null
    };
    let selectedDocumentMethod = null;
    let selectedPaymentMode = null;
    let currentApplicationId = null;
    let previouslyUploadedDocs = [];


    // --- DOM Elements ---
    const steps = [{
            id: 1,
            content: document.getElementById('step-1-content'),
            indicator: document.getElementById('step-1-indicator')
        },
        {
            id: 2,
            content: document.getElementById('step-2-content'),
            indicator: document.getElementById('step-2-indicator')
        },
        {
            id: 3,
            content: document.getElementById('step-3-content'),
            indicator: document.getElementById('step-3-indicator')
        },
        {
            id: 4,
            content: document.getElementById('step-4-content'),
            indicator: document.getElementById('step-4-indicator')
        }
    ];
    const finalPlanName = document.getElementById('final-plan-name');
    const finalPlanPrice = document.getElementById('final-plan-price');
    const confirmationMessage = document.getElementById('confirmation-message');
    const finalMessageText = document.getElementById('final-message-text');
    const step1NextButton = document.getElementById('step1-next-button');
    const step2NextButton = document.getElementById('step2-next-button');

    
    function updateUI() {
        steps.forEach(step => {
            const isCurrent = step.id === currentStep;
            const isCompleted = step.id < currentStep;

            step.content.classList.toggle('hidden', !isCurrent);

            const circle = step.indicator.querySelector('.step-circle');
            const text = step.indicator.querySelector('.step-text');

            circle.classList.remove('active', 'inactive', 'bg-green-500');
            text.classList.remove('active', 'inactive');

            if (isCompleted) {
                circle.classList.add('bg-green-500');
                text.classList.add('active');
            } else if (isCurrent) {
                circle.classList.add('active');
                text.classList.add('active');
            } else {
                circle.classList.add('inactive');
                text.classList.add('inactive');
            }
        });

        document.querySelectorAll('.plan-card').forEach(card => card.classList.remove('selected'));
        if (currentStep === 1 && selectedPlan.id) {
            document.getElementById(`card-${selectedPlan.id}`)?.classList.add('selected');
        }

        document.querySelectorAll('.doc-button').forEach(btn => btn.classList.remove('selected'));
        if (currentStep === 2 && selectedDocumentMethod) {
            document.querySelectorAll('.doc-button').forEach(btn => {
                if (btn.textContent.includes(selectedDocumentMethod)) btn.classList.add('selected');
            });
        }

        // Enable/disable next buttons
        step1NextButton.disabled = !selectedPlan.id;
        step2NextButton.disabled = !selectedDocumentMethod;

        step1NextButton.classList.toggle('btn-disabled', !selectedPlan.id);
        step2NextButton.classList.toggle('btn-disabled', !selectedDocumentMethod);
    }


    /***    Handles plan selection (Step 1).    */

    function selectPlan(id, name, price, event) {

        if (event && event.currentTarget.tagName.toLowerCase() === 'button') {
            event.stopPropagation();
        }

        // Clear previous selections
        document.querySelectorAll('.plan-card').forEach(card => {
            card.classList.remove('selected');
        });

        // Set the new selected plan
        selectedPlan = {
            id: id,
            name: name,
            price: price
        };

        // Highlight the current card
        const currentCard = document.getElementById(`card-${id}`);
        if (currentCard) {
            currentCard.classList.add('selected');
        }

        updateUI();
    }

    /**
     * Handles document submission method selection (Step 2).
     */
    function selectDocumentMethod(method, button) {
        selectedDocumentMethod = method;

        document.querySelectorAll('.doc-button').forEach(btn => {
            btn.classList.remove('selected');
        });
        button.classList.add('selected');

        updateUI();
    }


    function goToStep2() {
        if (!selectedPlan.id) return;
        document.getElementById('selected-plan-name-step2').textContent = selectedPlan.name;
        currentStep = 2;
        // Pre-fill final step details
        finalPlanName.textContent = selectedPlan.name;
        // Format price for display
        finalPlanPrice.textContent = `₹ ${selectedPlan.price.toLocaleString('en-IN')}`;
        updateUI();
    }

    async function goToStep3() {
        if (!selectedDocumentMethod || !selectedPlan.id) {
            alert('Please complete previous steps.');
            return;
        }

        showPageLoader('Preparing document upload...');

        // EMAIL FLOW
        if (selectedDocumentMethod === 'Email') {
            openEmailClient();
            hidePageLoader();
            return;
        }

        if (selectedDocumentMethod === 'WhatsApp') {

            const phone = '918700385119'; // country code + number
            const docsText = getDocumentsTextForWhatsApp();

            const message = encodeURIComponent(
                `Hello Capital Tax Plus Team,

    I have selected the "${selectedPlan.name}" plan for ITR filing.

    Required documents:
    ${docsText}

    I am attaching the above documents with this chat.

    Please guide me further.

    Thanks`
            );

            const whatsappUrl = `https://wa.me/${phone}?text=${message}`;

            window.open(whatsappUrl, '_blank');
            hidePageLoader();
            return;
        }

        try {
            const response = await fetch(SUBMIT_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                },
                body: JSON.stringify({
                    source_id: selectedPlan.id,
                    total_price: selectedPlan.price,
                    document_method: selectedDocumentMethod,
                    payment_mode: 'Chat'
                })
            });

            const result = await response.json();

            //  Validation / server error
            if (!response.ok) {
                console.error('Submission failed:', result);
                hidePageLoader();
                if (result.errors) {
                    const firstError = Object.values(result.errors)[0][0];
                    alert(firstError);
                } else {
                    alert(result.message || 'Failed to create application.');
                }
                return;
            }

            // SUCCESS
            currentApplicationId = result.application_id;
            console.log('Application Created:', currentApplicationId);

            previouslyUploadedDocs = result.documents || [];
            currentStep = 3;
            fetch(`/itr-filing/uploaded-documents/${currentApplicationId}`)
                .then(res => res.json())
                .then(data => {
                    previouslyUploadedDocs = data.documents || [];
                    renderRequiredDocuments();
                    updateUI();
                    hidePageLoader();
                });

        } catch (error) {
            console.error('Network error:', error);
            hidePageLoader();
            alert('Network error. Please try again.');
        }
    }




    function backToStep1() {
        selectedPlan = {
            id: null,
            name: null,
            price: null
        };
        selectedDocumentMethod = null;
        selectedPaymentMode = null;
        currentStep = 1;
        updateUI();
        // Clear highlights manually for clean slate
        document.querySelectorAll('.plan-card').forEach(card => card.classList.remove('selected'));
        document.querySelectorAll('.doc-button').forEach(btn => btn.classList.remove('selected'));
        document.querySelectorAll('.payment-button').forEach(btn => btn.classList.remove('selected'));
    }

    function backToStep2() {
        hidePageLoader();
        selectedPaymentMode = null;
        currentStep = 2;
        updateUI();
        document.querySelectorAll('.payment-button').forEach(btn => {
            btn.classList.remove('selected');
            btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            btn.classList.add('bg-gray-700', 'hover:bg-gray-600');
        });
    }

    function backToStep3() {
        hidePageLoader();
        currentStep = 3;

        fetch(`/itr-filing/uploaded-documents/${currentApplicationId}`)
            .then(res => res.json())
            .then(data => {
                previouslyUploadedDocs = data.documents || [];
                renderRequiredDocuments();
                updateUI();
            });
    }



    function resetApp() {
        // Hide modal
        confirmationMessage.classList.remove('visible');
        setTimeout(() => {
            confirmationMessage.classList.add('hidden');
            backToStep1();
        }, 300);
    }

    // Initialize the UI on page load
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const step = urlParams.get('step');
        const planId = urlParams.get('plan_id');

        // --- Auto-select plan if provided ---
        if (planId && PLANS_DATA[planId]) {
            const plan = PLANS_DATA[planId];
            selectPlan(plan.id, plan.income_source, plan.price);
            // Update the step 2 labels since we’re skipping ahead
            document.getElementById('selected-plan-name-step2').textContent = plan.income_source;
            finalPlanName.textContent = plan.income_source;
            finalPlanPrice.textContent = `₹ ${plan.price.toLocaleString('en-IN')}`;
        }

        // --- Jump directly to step 2 if ?step=2 ---
        if (step === '2') {
            currentStep = 2;
        }

        updateUI();

        // --- Smooth scroll to wizard area ---
        document.querySelector('.itr-container')?.scrollIntoView({
            behavior: 'smooth'
        });
    };

    function renderRequiredDocuments() {
        const plan = PLANS_DATA[selectedPlan.id];
        const docs = plan.document_list || [];

        const container = document.getElementById('required-documents');
        container.innerHTML = '';

        docs.forEach((doc, index) => {

            const uploaded = previouslyUploadedDocs.includes(doc);

            container.innerHTML += `
        <div class="doc-row">
            <div class="doc-info">
                <span class="doc-index">${index + 1}</span>
                <span class="doc-name">${doc}</span>
            </div>

            <label class="doc-upload">
                <input
                    type="file"
                    name="documents[${index}]"
                    data-doc-name="${doc}"
                    accept=".pdf,.jpg,.jpeg,.png"
                />

                <span class="upload-btn">
                    ${uploaded ? 'Replace File' : 'Choose File'}
                </span>

                <small class="file-name">
                    ${uploaded ? 'Previously uploaded ✓' : ''}
                </small>

                <small class="file-error hidden"></small>
            </label>
        </div>
        `;
        });

        updateUploadButtonState();
    }



    function uploadDocuments() {
        const formData = new FormData();
        const inputs = document.querySelectorAll('#required-documents input[type="file"]');
        const MAX_SIZE = 5 * 1024 * 1024; // 5MB

        if (!currentApplicationId) {
            alert('Application not created. Please complete previous steps.');
            return;
        }

        let hasAtLeastOneFile = false;
        let hasError = false;

        // Validate & collect ONLY selected files
        inputs.forEach(input => {
            const file = input.files[0];

            if (!file) return; //  skip empty inputs

            hasAtLeastOneFile = true;

            if (file.size > MAX_SIZE) {
                alert(`File "${file.name}" exceeds 5MB limit`);
                hasError = true;
                return;
            }


            formData.append('documents[]', file);
            formData.append('document_names[]', input.dataset.docName);
        });

        if (hasError) return;
        //  No file selected

        const hasPreviousUploads = previouslyUploadedDocs.length > 0;
        if (!hasAtLeastOneFile && !hasPreviousUploads) {
            alert('Please select at least one document to upload.');
            return;
        }

        formData.append('application_id', currentApplicationId);
        formData.append('_token', '{{ csrf_token() }}');

        const progressWrap = document.getElementById('upload-progress-wrapper');
        const progressBar = document.getElementById('upload-progress-bar');
        const progressText = document.getElementById('upload-progress-text');

        progressWrap.classList.remove('hidden');
        progressBar.style.width = '0%';
        progressBar.classList.remove('bg-green-500');

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("user.itr.upload-docs") }}', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                // const percent = Math.round((e.loaded / e.total) * 100);
                // progressBar.style.width = percent + '%';
                // progressText.textContent = `Uploading… ${percent}%`;
                progressText.textContent = `Uploading… `;
            }
        };

        xhr.onload = function() {
            if (xhr.status === 200) {

                // Progress UI
                progressText.textContent = 'Upload completed ✓';
                progressBar.style.width = '100%';
                progressBar.classList.add('bg-green-500');

                //  Small delay so user can see success
                setTimeout(() => {

                    //  Reset all file inputs & UI
                    inputs.forEach(input => {
                        const uploadBtn = input.nextElementSibling;
                        const fileNameEl = uploadBtn.nextElementSibling;
                        const errorEl = fileNameEl.nextElementSibling;

                        input.value = '';
                        input.disabled = false;

                        uploadBtn.textContent = 'Choose File';
                        uploadBtn.classList.remove('selected');
                        uploadBtn.removeAttribute('title');

                        fileNameEl.textContent = '';
                        errorEl.textContent = '';
                        errorEl.classList.add('hidden');
                    });

                    //  Reset progress bar
                    progressWrap.classList.add('hidden');
                    progressBar.style.width = '0%';
                    progressBar.classList.remove('bg-green-500');
                    progressText.textContent = '';

                    //  Disable submit button again
                    const submitBtn = document.getElementById('upload-submit-btn');
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');

                    goToStep4();

                }, 2000); // delay = UX polish

            } else {
                alert('Upload failed. Please try again.');
            }
        };


        xhr.onerror = function() {
            alert('Network error during upload.');
        };

        xhr.send(formData);
    }



    document.addEventListener('change', function(e) {
        if (e.target.type !== 'file') return;

        const input = e.target;
        const file = input.files[0];
        const uploadBtn = input.nextElementSibling;
        const fileNameEl = uploadBtn.nextElementSibling;
        const errorEl = fileNameEl.nextElementSibling;

        const allowedTypes = [
            'application/pdf',
            'image/jpeg',
            'image/png'
        ];

        // Reset helpers
        const resetInput = () => {
            input.value = '';
            uploadBtn.textContent = 'Choose File';
            uploadBtn.classList.remove('selected');
            fileNameEl.textContent = '';
            errorEl.textContent = '';
            errorEl.classList.add('hidden');
            uploadBtn.removeAttribute('title');

            updateUploadButtonState();
        };

        if (!file) {
            resetInput();
            return;
        }

        if (!allowedTypes.includes(file.type)) {
            errorEl.textContent = 'Only PDF, JPG, JPEG, PNG files are allowed.';
            errorEl.classList.remove('hidden');

            input.value = '';
            updateUploadButtonState();
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            errorEl.textContent = 'File size must be less than 5MB.';
            errorEl.classList.remove('hidden');

            input.value = ''; 
            uploadBtn.textContent = 'Choose File';
            uploadBtn.classList.remove('selected');
            fileNameEl.textContent = '';
            uploadBtn.removeAttribute('title');

            updateUploadButtonState();
            return;
        }


        // Valid file
        errorEl.textContent = '';
        errorEl.classList.add('hidden');
        uploadBtn.textContent = 'File Selected ✓';
        uploadBtn.classList.add('selected');
        uploadBtn.setAttribute('title', file.name);
        fileNameEl.textContent = file.name;

        updateUploadButtonState();
    });


    function isLikelyGmailUser() {
        return navigator.userAgent.includes('Chrome') &&
            !navigator.userAgent.includes('Edg') &&
            !navigator.userAgent.includes('OPR');
    }


    function openEmailClient() {

        const to = encodeURIComponent('support@capitaltaxplus.com');
        const subject = encodeURIComponent(
            `ITR Documents Submission – ${selectedPlan.name}`
        );

        const documentsText = getDocumentsTextForEmail();

        const body = encodeURIComponent(
            `Hello Capital Tax Plus Team,

    I have selected the "${selectedPlan.name}" plan for ITR filing.

    Below are the required documents for this plan:
    ${documentsText}

    I am attaching the above documents with this email.

    Plan Name : ${selectedPlan.name}
    Amount    : ₹${selectedPlan.price}

    Thanks & Regards,
    `
        );

        // Gmail compose URL
        const gmailUrl =
            `https://mail.google.com/mail/?view=cm&fs=1&to=${to}&su=${subject}&body=${body}`;

        // Mailto fallback
        const mailtoUrl =
            `mailto:support@capitaltaxplus.com?subject=${subject}&body=${body}`;

        // Prefer Gmail Web
        if (navigator.userAgent.includes('Chrome')) {
            window.open(gmailUrl, '_blank');
        } else {
            window.location.href = mailtoUrl;
        }
    }

    function showEmailFallbackMessage() {
        document.getElementById('email-fallback').classList.remove('hidden');
    }

    function closeEmailFallback() {
        document.getElementById('email-fallback').classList.add('hidden');
    }

    function getDocumentsTextForEmail() {
        const plan = PLANS_DATA[selectedPlan.id];
        const docs = plan.document_list || [];

        if (!docs.length) {
            return '• PAN Card\n• Aadhaar Card';
        }

        return docs.map((doc, index) => `${index + 1}. ${doc}`).join('\n');
    }

    function getDocumentsTextForWhatsApp() {
        const plan = PLANS_DATA[selectedPlan.id];
        const docs = plan.document_list || [];

        if (!docs.length) {
            return '• PAN Card\n• Aadhaar Card';
        }

        return docs.map((doc, i) => `${i + 1}. ${doc}`).join('\n');
    }


    function goToStep4() {

        document.getElementById('payment-plan-name').textContent = selectedPlan.name;
        document.getElementById('payment-plan-price').textContent =
            `₹ ${selectedPlan.price.toLocaleString('en-IN')}`;

        // fetch(`/itr-filing/payment-link/${currentApplicationId}`)
        //     .then(res => res.json())
        //     .then(data => {
        //         document.getElementById('payment-link').href = data.payment_link;
        //     });

        currentStep = 4;
        updateUI();
    }

    function updateUploadButtonState() {
        const submitBtn = document.getElementById('upload-submit-btn');
        const inputs = document.querySelectorAll('#required-documents input[type="file"]');

        const hasPreviousUploads = previouslyUploadedDocs.length > 0;
        const hasNewFileSelected = [...inputs].some(input => input.files.length > 0);

        // Enable if previous docs exist OR new file selected
        const enable = hasPreviousUploads || hasNewFileSelected;

        submitBtn.disabled = !enable;
        submitBtn.classList.toggle('opacity-50', !enable);
        submitBtn.classList.toggle('cursor-not-allowed', !enable);
    }

    function showPageLoader(message = 'Please wait...') {
        const loader = document.getElementById('page-loader');
        document.getElementById('loader-text').textContent = message;
        loader.classList.add('show');
    }

    function hidePageLoader() {
        document.getElementById('page-loader').classList.remove('show');
    }


    function goToStep(stepNumber) {
        currentStep = stepNumber;
        updateUI();

        // ALWAYS hide loader after UI update
        hidePageLoader();
    }

   async function showPaymentSuccess() {

    // Notify admin (email trigger)
    await fetch(`/itr-filing/payment-request/${currentApplicationId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    });

    // Create overlay
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.inset = '0';
    overlay.style.background = 'rgba(0,0,0,0.6)';
    overlay.style.backdropFilter = 'blur(4px)';
    overlay.style.zIndex = '999999';
    overlay.style.display = 'flex';
    overlay.style.alignItems = 'center';
    overlay.style.justifyContent = 'center';

    // Modal box
    const box = document.createElement('div');
    box.style.background = '#1f2937';
    box.style.padding = '40px';
    box.style.borderRadius = '20px';
    box.style.maxWidth = '420px';
    box.style.width = '90%';
    box.style.textAlign = 'center';
    box.style.color = '#fff';

    box.innerHTML = `
        <h2 style="font-size:22px;margin-bottom:12px">
            Thank you for choosing Capital Tax Plus
        </h2>
        <p style="color:#d1d5db">
            Our admin team will contact you shortly to complete your payment.
        </p>
    `;

    overlay.appendChild(box);
    document.body.appendChild(overlay);

    // lock scroll
    document.body.style.overflow = 'hidden';

    // Redirect home after 3 seconds
    setTimeout(() => {
        window.location.href = '/';
    }, 3000);
}


</script>
@endpush