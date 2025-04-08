<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain')->unique();
            $table->string('database');
            $table->string('username');
            $table->string('password');
            $table->enum('status', ['active', 'inactive'])->default('active');
            
            // Landlord information
            $table->string('landlord_name');
            $table->string('landlord_email')->unique();
            $table->string('landlord_password');
            
            // Approval information
            $table->boolean('is_approved')->default(false);
            $table->foreignId('approved_by')->nullable()->constrained('admins');
            $table->timestamp('approved_at')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}; 