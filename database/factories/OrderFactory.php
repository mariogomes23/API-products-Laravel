<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            "first_name"=>fake()->firstName(),
            "last_name"=>fake()->lastName(),
            "email"=>fake()->email()
            //
        ];
    }
}
