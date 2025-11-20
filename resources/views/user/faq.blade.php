@extends('layouts.app')

@push('styles')
@vite(['resources/css/user/faq.css'])
@endpush

@section('content')
<section class="faq-hero">
    <div class="container faq-container py-5">
        <!-- <div class="top-label text-center">
            <span class="pill">SPOTLESS · HOME SOLUTION</span>
        </div> -->

        <h1 class="faq-title">Frequently Asked Questions</h1>

        <div class="accordion-box mt-4">
            <div class="accordion" id="faqAccordion">
                @php
                $faqs = [
                [
                'q' => 'What is Income Tax Return (ITR) filing?',
                'a' => 'Income Tax Return filing is the process where individuals declare their income, deductions, and taxes paid to the government. It is an annual activity mandated by the tax authorities.'
                ],
                [
                'q' => 'Who is required to file an Income Tax Return?',
                'a' => 'Any individual or entity whose income exceeds the exempted limit as per the Income Tax Act is required to file an Income Tax Return. This includes salaried individuals, self-employed professionals, and businesses.'
                ],
                [
                'q' => 'What is the due date for filing Income Tax Return?',
                'a' => 'The due date for filing Income Tax Returns in India is usually July 31st of the assessment year. However, this date may be extended by the government in certain cases.'
                ],
                [
                'q' => 'Can I file my Income Tax Return after the due date?',
                'a' => 'Yes, you can file your Income Tax Return after the due date. However, it is advisable to file it within the stipulated time to avoid penalties and interest on any tax dues.'
                ],
                [
                'q' => 'What are the consequences of not filing Income Tax Return?',
                'a' => 'Not filing Income Tax Returns within the due date may result in penalties and interest on tax dues. It could also lead to legal consequences.'
                ],
                [
                'q' => 'Can I revise my Income Tax Return after filing?',
                'a' => 'Yes, if you discover any errors or omissions in your original filing, you can file a revised return within the specified time frame.'
                ],
                [
                'q' => 'Who needs to register for GST?',
                'a' => 'Any business or individual involved in the supply of goods or services with an aggregate turnover exceeding the prescribed threshold limit is required to register for GST.'
                ],
                [
                'q' => 'What are the consequences of non-compliance with GST regulations?',
                'a' => 'Non-compliance with GST regulations may result in penalties and fines. It is crucial to adhere to the filing deadlines and comply with the GST provisions to avoid legal consequences.'
                ],
                [
                'q' => 'Can I voluntarily cancel my GST registration?',
                'a' => 'Yes, businesses can apply for voluntary cancellation of GST registration if they cease to carry on the taxable activity or if their turnover falls below the threshold limit.'
                ],
                [
                'q' => 'If no taxes have been deducted from my salary, should my employer issue Form-16 to me?',
                'a' => 'If no taxes have been deducted from your salary, your employer is not required to issue Form 16 to you. However, your employer may still be required to file an annual return with the tax authorities, stating the details of the salary paid to you and the taxes deducted at source, if any.If you are a salaried individual and your employer has not deducted tax at source from your salary, you will still be required to file an income tax return and pay taxes on the salary income earned by you. You can use the salary details provided in your salary slip or the salary certificate issued by your employer to file your income tax return.'
                ],
                ];
                @endphp


                @foreach($faqs as $idx => $item)
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="heading{{ $idx }}">
                        <button class="accordion-button collapsed faq-btn d-flex align-items-center"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $idx }}"
                            aria-expanded="false"
                            aria-controls="collapse{{ $idx }}">
                            <span class="faq-question flex-grow-1">{{ $item['q'] }}</span>
                            <span class="faq-chevron">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="12" cy="12" r="11" stroke="none" fill="#5D3DF6" opacity="1" />
                                    <path d="M9 10l3 3 3-3" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                                </svg>
                            </span>
                        </button>
                    </h2>

                    <div id="collapse{{ $idx }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $idx }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ $item['a'] }}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Rotate chevrons when open/close
    document.querySelectorAll('.accordion').forEach(acc => {
        acc.addEventListener('show.bs.collapse', e => {
            const btn = e.target.previousElementSibling.querySelector('.faq-chevron svg');
            if (btn) btn.style.transform = 'rotate(180deg)';
        });
        acc.addEventListener('hide.bs.collapse', e => {
            const btn = e.target.previousElementSibling.querySelector('.faq-chevron svg');
            if (btn) btn.style.transform = 'rotate(0deg)';
        });
    });
</script>
@endpush
@endsection