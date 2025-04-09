@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Pending Tenants</h5>
                </div>
                <div class="card-body">
                    @if($pendingTenants->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Email</th>
                                        <th>Domain</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendingTenants as $tenant)
                                        <tr>
                                            <td>{{ $tenant->business_name }}</td>
                                            <td>{{ $tenant->email }}</td>
                                            <td>{{ $tenant->domain }}</td>
                                            <td>
                                                <form action="{{ route('admin.tenants.approve', $tenant) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.tenants.reject', $tenant) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="mb-0">No pending tenants.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Approved Tenants</h5>
                </div>
                <div class="card-body">
                    @if($approvedTenants->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Domain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($approvedTenants as $tenant)
                                        <tr>
                                            <td>{{ $tenant->business_name }}</td>
                                            <td>{{ $tenant->domain }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="mb-0">No approved tenants.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Rejected Tenants</h5>
                </div>
                <div class="card-body">
                    @if($rejectedTenants->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Domain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rejectedTenants as $tenant)
                                        <tr>
                                            <td>{{ $tenant->business_name }}</td>
                                            <td>{{ $tenant->domain }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="mb-0">No rejected tenants.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 