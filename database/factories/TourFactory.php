<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tourist_place_id' => $this->faker->numberBetween(1, 12),
            'schedule' => $this->faker->sentences(3,true),
            'description' => $this->faker->sentences(1,true),
            'seats' => $this->faker->numberBetween(13, 100),
            'price' => $this->faker->randomFloat(50.0, 1900.0),
            'takeoff_date' => $this->faker->dateTimeBetween('+0 days', '+1 month'),
            'duration' => $this->faker->numberBetween(15, 35),
            'published_at' => now(),
        ];
    }
}
