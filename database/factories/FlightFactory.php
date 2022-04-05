<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'origin_id'=>City::factory()->create(),
            'destination_id'=>City::factory()->create(),
            'airline_id'=>Airline::factory()->create(),
            'takeoffTime'=>$this->faker->time,
            'landingTime'=>$this->faker->time
        ];
    }
}
