<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_uz', 'name_ru'];

    public function service(){
        return $this->hasMany(Service::class);
    }

    // Optional: If a ServiceList has many Skills
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
