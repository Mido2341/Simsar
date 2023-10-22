<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rent>
 */
class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'rent_photo'=>fake()->imageUrl(),
            'rent_num'=>fake()->phoneNumber(),
            'rent_price'=>fake()->numberBetween(100,1000),
            'rent_address'=>fake()->address(),
            'rent_city'=>fake()->city(),
            'rent_description'=>fake()->text(200),
            'user_id'=>User::inRandomOrder()->first()->id

        ];
    }
}
