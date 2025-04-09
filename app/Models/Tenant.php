<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'business_name',
        'email',
        'domain',
        'status', // pending, approved, rejected
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
