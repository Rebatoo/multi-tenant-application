@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">{{ __('Registration Submitted Successfully!') }}</h4>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>

                    <h5 class="text-center mb-4">{{ __('Thank you for your registration!') }}</h5>

                    <div class="alert alert-info">
                        <p class="mb-0">{{ __('Your application is now pending admin approval. Once approved, you will receive an email with further instructions on how to access your tenant domain.') }}</p>
                    </div>

                    <div class="mt-4">
                        <h6>{{ __('Next Steps:') }}</h6>
                        <ul>
                            <li>{{ __('Check your email for a confirmation of your registration') }}</li>
                            <li>{{ __('Wait for admin approval (usually within 24-48 hours)') }}</li>
                            <li>{{ __('Once approved, you will receive access credentials') }}</li>
                        </ul>
                    </div>

                    <hr>

                    <div class="text-center mt-4">
                        <a href="{{ url('/') }}" class="btn btn-primary">{{ __('Return to Homepage') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 