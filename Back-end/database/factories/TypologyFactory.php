<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TypologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() 
            -> unique() 
            -> randomElement([
                'Cinese', 
                'Giapponese',
                'Pizza',
                'Kebab',
                'Thailandese',
                'Fast Food',
                'Biologico',
                'Italiano'
            ]),
        ];
    }
}
