<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function flight(){
        return $this->hasMany(Flight::class);
    }

    public function airline()
    {
        return $this->belongsToMany(Airline::class,'airline__cities','city_id','airline_id')->withTimestamps();
    }
}
