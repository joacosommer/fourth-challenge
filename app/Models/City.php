<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $with = ['arrivals', 'departures'];
    protected $table = 'cities';
    protected $fillable = ['name'];

    public function arrivals(){
        return $this->hasMany(Flight::class,'destination_id');
    }
    public function departures(){
        return $this->hasMany(Flight::class,'origin_id');
    }

    public function airline()
    {
        return $this->belongsToMany(Airline::class,'airline__cities','city_id','airline_id')->withTimestamps();
    }
}
