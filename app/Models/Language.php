<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages'; // Jadval nomi

    protected $fillable = [
        'name',
        'code',
    ];


    public function providers()
    {
        return $this->belongsToMany(Provider::class, 'provider_language');
    }
}
