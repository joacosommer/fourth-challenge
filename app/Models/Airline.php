<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    public function flight(){
        return $this->hasMany(Flight::class);
    }

    public function city()
    {
        return $this->belongsToMany(City::class,'airline__cities','airline_id', 'city_id')->withTimestamps();
    }
}
