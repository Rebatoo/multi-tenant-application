@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Admin Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Applications</h5>
                                    <p class="display-4">{{ \App\Models\Tenant::where('is_approved', false)->count() }}</p>
                                    <a href="{{ route('tenants.index', ['filter' => 'pending']) }}" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Active Tenants</h5>
                                    <p class="display-4">{{ \App\Models\Tenant::where('status', 'active')->count() }}</p>
                                    <a href="{{ route('tenants.index', ['filter' => 'active']) }}" class="btn btn-success">View All</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Total Tenants</h5>
                                    <p class="display-4">{{ \App\Models\Tenant::count() }}</p>
                                    <a href="{{ route('tenants.index') }}" class="btn btn-info">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Recent Applications</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Landlord</th>
                                                    <th>Domain</th>
                                                    <th>Status</th>
                                                    <th>Applied At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(\App\Models\Tenant::latest()->take(5)->get() as $tenant)
                                                    <tr>
                                                        <td>{{ $tenant->landlord_name }}</td>
                                                        <td>{{ $tenant->domain }}.example.com</td>
                                                        <td>
                                                            @if($tenant->is_approved)
                                                                <span class="badge bg-success">Approved</span>
                                                            @else
                                                                <span class="badge bg-warning">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $tenant->created_at->format('M d, Y H:i') }}</td>
                                                        <td>
                                                            <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-sm btn-info">View</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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