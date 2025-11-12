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
            <span class="step-text inactive">Documents</span>
        </div>

        <!-- Step 3: Payment -->
        <div id="step-3-indicator" class="step-item">
            <div class="step-circle inactive" data-step="3">3</div>
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
            $features = json_decode($plan->document_list, true) ?? ['Basic Filing', 'Expert Support'];
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
    <div id="step-3-content" class="space-y-6 hidden max-w-lg mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center text-white">3. Payment Finalization</h2>

        <div class="summary-card">
            <div class="flex justify-between items-center pb-4 border-b border-gray-700">
                <p class="text-xl font-semibold text-gray-300">Plan:</p>
                <p id="final-plan-name" class="text-2xl plan-name"></p>
            </div>
            <div class="flex justify-between items-center py-4 mb-6">
                <p class="text-xl font-semibold text-gray-300">Total Amount:</p>
                <p id="final-plan-price" class="text-3xl price-amount"></p>
            </div>

            <p class="text-lg text-center text-gray-300 mb-6">
                Please tell us how you would like to receive the secure payment link (UPI, Card, Net Banking).
            </p>

            <div class="space-y-3">
                <button onclick="confirmPayment('Email', this)" class="payment-button w-full flex items-center justify-center p-4 bg-gray-700 hover:bg-gray-600 text-white font-bold text-lg">
                    {{-- Icon placeholder --}}
                    <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 21h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg> Get Payment Link via Email
                </button>
                <button onclick="confirmPayment('WhatsApp', this)" class="payment-button w-full flex items-center justify-center p-4 bg-gray-700 hover:bg-gray-600 text-white font-bold text-lg">
                    {{-- Icon placeholder --}}
                    <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7.9 20A10.1 10.1 0 0 0 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2 2 6.5 2 12c0 2.2.8 4.2 2.1 5.9L2 22l4.1-2.1z" />
                        <path d="m10 8 4 4-4 4" />
                    </svg> Get Payment Link via WhatsApp
                </button>
                <button onclick="confirmPayment('Chat', this)" class="payment-button w-full flex items-center justify-center p-4 bg-gray-700 hover:bg-gray-600 text-white font-bold text-lg">
                    {{-- Icon placeholder --}}
                    <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg> Start Live Chat for Payment
                </button>
            </div>

            <p class="text-xs text-center text-gray-500 mt-4">
                Our tax expert will use your preferred method to proceed with the payment and filing.
            </p>
        </div>

        <div class="text-center pt-8">
            <button onclick="backToStep2()" class="px-6 py-2 text-sm font-medium text-gray-300 bg-gray-700 rounded-full hover:bg-gray-600 transition duration-200">
                &larr; Back to Documents
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

@endsection

@push('scripts')
<script>
    // Laravel data passed from the Controller
    // Assuming $plans is passed as an associative array keyed by ID (keyBy('id'))
    const PLANS_DATA = @json($plans->keyBy('id'));
    const SUBMIT_URL = '{{ route('user.itr-filing.submit') }}';

    // --- State Variables ---
    let currentStep = 1;
    let selectedPlan = {
        id: null,
        name: null,
        price: null
    };
    let selectedDocumentMethod = null;
    let selectedPaymentMode = null;

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
        }
    ];
    const finalPlanName = document.getElementById('final-plan-name');
    const finalPlanPrice = document.getElementById('final-plan-price');
    const confirmationMessage = document.getElementById('confirmation-message');
    const finalMessageText = document.getElementById('final-message-text');
    const step1NextButton = document.getElementById('step1-next-button');
    const step2NextButton = document.getElementById('step2-next-button');

    // --- Utility Functions ---

    /**
     * Updates the visibility of the steps and the progress indicators.
     */
    function updateUI() {
        steps.forEach(step => {
            const isCurrent = step.id === currentStep;
            const isCompleted = step.id < currentStep;

            // Content visibility
            step.content.classList.toggle('hidden', !isCurrent);

            // Indicator elements
            const circle = step.indicator.querySelector('.step-circle');
            const text = step.indicator.querySelector('.step-text');

            // Reset classes first
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

        // Update selection visual states
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


    /**
     * Handles plan selection (Step 1).
     */
    function selectPlan(id, name, price, event) {
        // Prevent event propagation if triggered from nested element
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

        // Simple visual feedback for the selected document method
        document.querySelectorAll('.doc-button').forEach(btn => {
            btn.classList.remove('selected');
        });
        button.classList.add('selected');

        updateUI();
    }

    /**
     * Final confirmation of payment channel (Step 3 -> Submission).
     */
    async function confirmPayment(mode, button) {
        selectedPaymentMode = mode;

        // Visual feedback
        document.querySelectorAll('.payment-button').forEach(btn => {
            btn.classList.remove('selected');
            btn.classList.add('bg-gray-700', 'hover:bg-gray-600');
            btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
        });
        button.classList.add('selected');
        button.classList.remove('bg-gray-700', 'hover:bg-gray-600');
        button.classList.add('bg-indigo-600', 'hover:bg-indigo-700');

        // Prepare data for submission
        const submissionData = {
            source_id: selectedPlan.id,
            total_price: selectedPlan.price,
            document_method: selectedDocumentMethod,
            payment_mode: selectedPaymentMode,
            _token: '{{ csrf_token() }}' // Laravel CSRF token
        };

        try {
            const response = await fetch(SUBMIT_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(submissionData)
            });

            const result = await response.json();

            if (response.ok) {
                // SUCCESS
                // FIX: Corrected string interpolation error (used backticks for template literal)
                let message = `Thank you for selecting the <strong>${selectedPlan.name}</strong> plan! You chose to share documents via <strong>${selectedDocumentMethod}</strong>. We have saved your application (ID: ${result.application_id}). We will contact you shortly via <strong>${selectedPaymentMode}</strong> to share the payment link and finalize your filing.`;

                finalMessageText.innerHTML = message;
                confirmationMessage.classList.remove('hidden');
                // Use a slight delay to trigger the CSS transition for a smoother appearance
                setTimeout(() => confirmationMessage.classList.add('visible'), 10);
            } else {
                // FAILURE
                let errorMessage = result.error || 'Submission failed. Please check your data and try again.';
                // Use a simple alert for error since custom error modals are complex
                alert('Submission Error: ' + errorMessage);
                console.error(result);
            }
        } catch (error) {
            console.error('Network Error:', error);
            alert('A network error occurred. Please check your connection and try again.');
        }
    }

    // --- Navigation Functions ---

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

    function goToStep3() {
        if (!selectedDocumentMethod) return;
        currentStep = 3;
        updateUI();
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
        selectedPaymentMode = null;
        currentStep = 2;
        updateUI();
        document.querySelectorAll('.payment-button').forEach(btn => {
            btn.classList.remove('selected');
            btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            btn.classList.add('bg-gray-700', 'hover:bg-gray-600');
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
        updateUI();
    }
</script>
@endpush