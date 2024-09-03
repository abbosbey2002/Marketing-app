<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_list_id',
        'startingPrice',
        'description',
        'provider_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function serviceList(){
        return $this->belongsTo(serviceList::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    // If a service can have multiple skills
    public function skills()
{
    return $this->belongsToMany(Skill::class);
}

}
