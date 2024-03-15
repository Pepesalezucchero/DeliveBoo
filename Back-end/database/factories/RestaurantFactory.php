<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // sistemare dati quando database finito
            'name' => fake() 
            -> unique() 
            -> randomElement([
                'Gigino', 
                'Biologicamente',
                'Il tempio Veg',
                'La Fenice',
                'L\'oste',
                'Al mattone',
                'Scalini',
                'Da nonna Bea',
                'Il corallo',
                'Il cuore napoletano',
            ]),
            'address' => fake() -> address(),
            // da mettere vera p.iva
            'vat_number' => fake() -> numberBetween(10000000000,99999999999),
        ];
    }
}
