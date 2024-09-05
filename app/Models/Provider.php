<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'providers';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'turnover',
        'teamSize',
        'tagline',
        'foundedAt',
        'description',
        'logo',
        'cover',
        'email',
        'password',
        'language_id',
        'service_id'
    ];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'provider_service', 'provider_id');
    }

    public function skills()
    {
        return $this->hasManyThrough(Skill::class, ProviderService::class, 'provider_id', 'id', 'id', 'service_id');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'provider_language');
    }

    

    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
