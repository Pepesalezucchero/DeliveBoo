<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address' => fake() -> address(),
            'date' => fake() -> dateTime(),
            'amount' => fake() -> randomFloat(2, 3, 1000),
            'customer_name' => fake() -> name(),
            'customer_email' => fake() -> safeEmail(),
            'customer_phone' => fake() -> phoneNumber(),
        ];
    }
}
