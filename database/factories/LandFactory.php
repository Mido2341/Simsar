<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Land>
 */
class LandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //  'land_photo'=>fake()->imageUrl(),
             'land_num'=>fake()->phoneNumber(),
             'meter_price'=>fake()->numberBetween(1000,20000),
             'land_area'=>fake()->numberBetween(5,1000),
             'land_address'=>fake()->address(),
             'land_city'=>fake()->city(),
             'land_description'=>fake()->text(200),
            'user_id'=>User::inRandomOrder()->first()->id

        ];
    }
}
