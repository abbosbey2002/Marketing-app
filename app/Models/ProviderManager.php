<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ProviderManager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'providers_manager';

    protected $fillable = [
        'provider_id', // Buni kiritishni unutmang
        'manager_name',
        'manager_email',
        'manager_password',
        'role',
    ];

    protected $hidden = [
        'manager_password',
        'remember_token',
    ];

    protected $casts = [
        'manager_password' => 'hashed',
    ];
    
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
