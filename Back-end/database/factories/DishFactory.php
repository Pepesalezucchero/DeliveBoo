<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> words(2, true) ,
            'description' => fake() -> sentences(4, true),
            'price' => fake() -> randomFloat(2, 3, 90),
            'visible' => fake() -> boolean(true),
        ];
    }
}
