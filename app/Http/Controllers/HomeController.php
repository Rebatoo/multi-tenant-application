<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function homepage()
    {
        $tenants = Tenant::where('status', 'approved')->get();
        return view('homepage', compact('tenants'));
    }
} 