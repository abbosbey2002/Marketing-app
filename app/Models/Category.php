<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'name',
    ];


    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
