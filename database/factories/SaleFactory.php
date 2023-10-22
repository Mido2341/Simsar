<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'sale_photo'=>fake()->imageUrl([]),
            'sale_num'=>fake()->phoneNumber(),
            'sale_price'=>fake()->numberBetween(1000,10000),
            'sale_address'=>fake()->address(),
            'sale_city'=>fake()->city(),
            'sale_description'=>fake()->text(200),
            'user_id'=>User::inRandomOrder()->first()->id
        ];
    }
}
