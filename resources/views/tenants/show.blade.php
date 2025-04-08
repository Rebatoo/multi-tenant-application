@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Tenant Details</h3>
                        <div>
                            <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">ID:</div>
                        <div class="col-md-8">{{ $tenant->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Name:</div>
                        <div class="col-md-8">{{ $tenant->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Domain:</div>
                        <div class="col-md-8">{{ $tenant->domain }}.example.com</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Database:</div>
                        <div class="col-md-8">{{ $tenant->database }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Database Username:</div>
                        <div class="col-md-8">{{ $tenant->username }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Status:</div>
                        <div class="col-md-8">
                            <span class="badge {{ $tenant->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($tenant->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Created At:</div>
                        <div class="col-md-8">{{ $tenant->created_at->format('Y-m-d H:i:s') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Updated At:</div>
                        <div class="col-md-8">{{ $tenant->updated_at->format('Y-m-d H:i:s') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 