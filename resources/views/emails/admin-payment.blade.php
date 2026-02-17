<h2>New ITR Payment Request</h2>

<p>A user has requested payment.</p>

<ul>
    <li><strong>Application ID:</strong> {{ $application->id }}</li>
    <li><strong>Plan:</strong> {{ $application->plan->income_source ?? 'N/A' }}</li>
    <li><strong>Amount:</strong> ₹{{ $application->total_price }}</li>
</ul>

<p>Please contact the customer to complete payment.</p>
