<?php

namespace Database\Seeders;

use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::factory(10)->create();
        Airline::factory(5)->create();
        Flight::factory(10)->create();
        $city = City::find(1);
        $airline = Airline::find(1);
        $city->airline()->attach($airline);
    }
}
