<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

//    protected $with = ['origin', 'destination', 'airplane'];

    public function origin(){
        return $this->belongsTo(City::class);
    }

    public function destination(){
        return $this->belongsTo(City::class);
    }

    public function airline(){
        return $this->belongsTo(Airline::class);
    }
}
