<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{

    public function definition(): array
    {
        return [

         "title" => fake()->text(),
         "description"=>fake()->text(),
         "image"=>fake()->imageUrl(),
         "price"=>fake()->numberBetween(10,100)
            //
        ];
    }
}
