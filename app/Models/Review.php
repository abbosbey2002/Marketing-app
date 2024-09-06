<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'description_summary',
        'origin',
        'user_full_name',
        'email',
        'user_job_title',
        'user_company_name',
        'company_industry',
        'company_size',
        'providing_service',
        'language_id',
        'provider_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
