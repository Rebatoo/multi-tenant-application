@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Available Services</h1>

    <div class="row">
        @forelse($tenants as $tenant)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tenant->business_name }}</h5>
                        <p class="card-text">Domain: {{ $tenant->domain }}</p>
                        <a href="http://{{ $tenant->domain }}.localhost:8000" class="btn btn-primary">Visit Service</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No services available at the moment.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection 