<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderServiceSkill extends Model
{
    use HasFactory;

    // Jadval nomi
    protected $table = 'provider_service_skill';

    // Mass assignment uchun ruxsat etilgan maydonlar
    protected $fillable = [
        'provider_id',
        'service_id',
        'skill_id',
    ];

    /**
     * Provayder bilan bog'liq munosabat.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    /**
     * Xizmat bilan bog'liq munosabat.
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Ko'nikma (Skill) bilan bog'liq munosabat.
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
