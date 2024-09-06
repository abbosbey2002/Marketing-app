<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderService extends Model
{
    use HasFactory;
    


    protected $table = 'provider_service';


    protected $fillable = [
        'provider_id',
        'service_id',
        'skills',
        'description',
        'price',
        // Qo'shimcha ustunlar bo'lsa, ularni ham qo'shishingiz mumkin
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function skilldata(){
        return $this->skills;
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
