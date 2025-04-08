<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LandlordRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('landlord.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tenants,landlord_email',
            'password' => 'required|string|min:8|confirmed',
            'domain' => 'required|string|max:255|unique:tenants,domain',
            'tenant_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $tenant = Tenant::create([
                'name' => $request->tenant_name,
                'domain' => $request->domain,
                'database' => $request->domain . '_db',
                'username' => $request->domain . '_user',
                'password' => Hash::make($request->domain . '_pass'),
                'status' => 'inactive',
                'landlord_name' => $request->name,
                'landlord_email' => $request->email,
                'landlord_password' => Hash::make($request->password),
                'is_approved' => false,
            ]);

            return redirect()->route('landlord.register.success')
                ->with('success', 'Your application has been submitted. Please wait for admin approval.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while processing your registration. Please try again.')
                ->withInput();
        }
    }

    public function showSuccess()
    {
        return view('landlord.success');
    }
} 