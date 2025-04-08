<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'database',
        'username',
        'password',
        'status',
        'landlord_name',
        'landlord_email',
        'landlord_password',
        'is_approved',
        'approved_by',
        'approved_at'
    ];

    protected $hidden = [
        'password',
        'landlord_password'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'approved_at' => 'datetime'
    ];

    public function approver()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }
}
