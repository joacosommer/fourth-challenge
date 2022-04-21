<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $with = ['flights', 'cities'];
    protected $table = 'airlines';
    protected $fillable = ['name','description'];

    public function flights(){
        return $this->hasMany(Flight::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class,'airline__cities','airline_id', 'city_id')->withTimestamps();
    }
}
