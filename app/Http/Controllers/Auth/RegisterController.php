<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'domain' => 'required|string|max:255|unique:tenants|regex:/^[a-z0-9-]+$/',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $tenant = Tenant::create([
            'business_name' => $request->business_name,
            'email' => $request->email,
            'domain' => $request->domain,
            'status' => 'pending',
        ]);

        $user = User::create([
            'name' => $request->business_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tenant_id' => $tenant->id,
        ]);

        return redirect()->route('login')
            ->with('success', 'Registration successful! Please wait for admin approval.');
    }
} 