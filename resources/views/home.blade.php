@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="display-4">Welcome to Multi-tenancy App</h1>
    <p class="lead">A platform for managing multiple tenants with their own domains.</p>
    <div class="mt-4">
        <a href="{{ route('homepage') }}" class="btn btn-primary btn-lg">View Offers</a>
    </div>
</div>
@endsection 