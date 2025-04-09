<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingTenants = Tenant::where('status', 'pending')->get();
        $approvedTenants = Tenant::where('status', 'approved')->get();
        $rejectedTenants = Tenant::where('status', 'rejected')->get();

        return view('admin.dashboard', compact('pendingTenants', 'approvedTenants', 'rejectedTenants'));
    }

    public function approveTenant(Tenant $tenant)
    {
        $tenant->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Tenant approved successfully');
    }

    public function rejectTenant(Tenant $tenant)
    {
        $tenant->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Tenant rejected successfully');
    }
} 