@extends('layouts.app')

@push('styles')
@vite(['resources/css/user/service.css'])
@endpush

@section('content')
<section class="itr-filing py-5">
    <div class="container">
        <h1 class="fw-bold text-center mb-4 text-teal">ITR Filing</h1>
        <p class="text-center text-muted mb-5">
            File your GST returns securely and effortlessly with our expert assistance.
        </p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3">ITR Filing Form</h4>

                        <!-- Example form -->
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="income" class="form-label">Annual Income</label>
                                <input type="number" id="income" name="income" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-teal w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection