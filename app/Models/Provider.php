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

     public function skills()
    {
        return $this->belongsToMany(Skill::class, 'provider_skill');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function service()
    {
        return $this->belongsTo(ServiceList::class);
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
