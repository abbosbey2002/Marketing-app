<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'youtube_url',
        'expertise',
        'skills',
        'budget',
        'start_date',
        'end_date',
        'introduction',
        'challenges',
        'solution',
        'impact',
        'link',
        'company_name',
        'company_location',
        'sector',
        'audience',
        'email',
        'geographic_scope',
        'service_id',
        'provider_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
