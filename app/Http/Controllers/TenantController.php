<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $tenants = Tenant::with('approver')->get();
        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255|unique:tenants',
            'database' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        Tenant::create($validated);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant created successfully.');
    }

    public function show(Tenant $tenant)
    {
        return view('admin.tenants.show', compact('tenant'));
    }

    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255|unique:tenants,domain,' . $tenant->id,
            'database' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $tenant->update($validated);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant updated successfully.');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant deleted successfully.');
    }

    public function approve(Tenant $tenant)
    {
        $tenant->update([
            'is_approved' => true,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'status' => 'active'
        ]);

        return redirect()->route('admin.tenants.index')
            ->with('success', 'Tenant approved successfully.');
    }

    public function reject(Tenant $tenant)
    {
        $tenant->update([
            'is_approved' => false,
            'approved_by' => null,
            'approved_at' => null,
            'status' => 'inactive'
        ]);

        return redirect()->route('admin.tenants.index')
            ->with('success', 'Tenant rejected successfully.');
    }
} 