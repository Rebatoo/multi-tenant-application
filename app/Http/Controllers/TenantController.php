<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('tenant.dashboard', ['tenant' => $request->tenant]);
    }
} 