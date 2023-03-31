<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdemItem>
 */
class OrdemItemFactory extends Factory
{

    public function definition(): array
    {
        return [
            //
            "product_title" => fake()->text(),
            "quantity" => fake()->numberBetween(10,100),
            "price"=>fake()->numberBetween(1,8)

        ];
    }
}
