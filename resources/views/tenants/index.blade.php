@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Tenants</h3>
                        <a href="{{ route('tenants.create') }}" class="btn btn-primary">Create New Tenant</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Domain</th>
                                <th>Database</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->id }}</td>
                                    <td>{{ $tenant->name }}</td>
                                    <td>{{ $tenant->domain }}</td>
                                    <td>{{ $tenant->database }}</td>
                                    <td>
                                        <span class="badge {{ $tenant->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($tenant->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('tenants.destroy', $tenant) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this tenant?')">Delete</button>
                                        </form>
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
@endsection 