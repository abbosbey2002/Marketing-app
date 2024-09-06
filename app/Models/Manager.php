<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'managers';

    protected $fillable = [
        'provider_id',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
