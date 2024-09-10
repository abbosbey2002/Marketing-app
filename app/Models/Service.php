<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_uz', 'name_ru', 'category_id'];

    // Optional: If a ServiceList has many Skills
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function providerSkills()
    {
        return $this->hasMany(ProviderServiceSkill::class);  // `provider_id` bo'yicha filtrlash
    }

    public function providerService()
    {
        return $this->hasOne(ProviderService::class);  // `provider_id` bo'yicha filtrlash
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class, 'provider_service', 'service_id', 'provider_id');
    }
}
