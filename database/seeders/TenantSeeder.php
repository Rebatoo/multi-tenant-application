<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::create([
            'name' => 'Test Tenant 1',
            'domain' => 'tenant1',
            'database' => 'tenant1_db',
            'username' => 'tenant1_user',
            'password' => Hash::make('tenant1_pass'),
            'status' => 'active',
            'landlord_name' => 'John Doe',
            'landlord_email' => 'john@tenant1.com',
            'landlord_password' => Hash::make('password123'),
            'is_approved' => true
        ]);

        Tenant::create([
            'name' => 'Test Tenant 2',
            'domain' => 'tenant2',
            'database' => 'tenant2_db',
            'username' => 'tenant2_user',
            'password' => Hash::make('tenant2_pass'),
            'status' => 'active',
            'landlord_name' => 'Jane Smith',
            'landlord_email' => 'jane@tenant2.com',
            'landlord_password' => Hash::make('password123'),
            'is_approved' => false
        ]);
    }
} 