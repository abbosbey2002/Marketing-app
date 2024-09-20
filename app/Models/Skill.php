<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_uz', 'name_ru', 'category', 'service_id'];

    public function serviceList()
    {
        return $this->belongsTo(Service::class);
    }
}
