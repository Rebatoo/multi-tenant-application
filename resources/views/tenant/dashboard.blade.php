@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tenant Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <h3>Welcome to {{ $tenant->name }}'s Dashboard</h3>
                        <p class="text-muted">You are accessing the tenant-specific area.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Tenant Information</h5>
                                    <ul class="list-unstyled">
                                        <li><strong>Domain:</strong> {{ $tenant->domain }}.example.com</li>
                                        <li><strong>Database:</strong> {{ $tenant->database }}</li>
                                        <li><strong>Status:</strong> 
                                            <span class="badge {{ $tenant->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($tenant->status) }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Quick Actions</h5>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('tenant.profile') }}" class="btn btn-primary">View Profile</a>
                                        <a href="/" class="btn btn-secondary">Back to Main Site</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 