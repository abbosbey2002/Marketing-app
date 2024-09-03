<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'phone_number',
        'email',
        'link',
        'location',
    ];

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

}
