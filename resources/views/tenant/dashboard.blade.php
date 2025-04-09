@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tenant Dashboard</div>

                <div class="card-body">
                    <h5 class="card-title">Welcome, {{ $tenant->business_name }}!</h5>
                    <p class="card-text">Your domain: {{ $tenant->domain }}</p>
                    
                    <div class="alert alert-info">
                        <p class="mb-0">Your tenant dashboard is accessible at: 
                            <a href="http://{{ $tenant->domain }}.localhost:8000/dashboard" target="_blank">
                                http://{{ $tenant->domain }}.localhost:8000/dashboard
                            </a>
                        </p>
                    </div>

                    <div class="mt-4">
                        <h6>Quick Stats</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Users</h6>
                                        <p class="card-text display-6">0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h6 class="card-title">Active Users</h6>
                                        <p class="card-text display-6">0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Revenue</h6>
                                        <p class="card-text display-6">$0</p>
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