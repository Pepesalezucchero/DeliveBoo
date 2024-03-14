<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\User;
use App\Models\Typology;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User :: inRandomOrder() 
        -> limit(10)
        -> get()
        -> each(function($user) {
            // creo un ristorante associato a ciascun user
            $restaurant = $user->restaurant()->create(Restaurant::factory()->make()->toArray());

            // Attach multiple typologies to each restaurant
            Typology::inRandomOrder()
            ->limit(rand(1, 5)) // You can adjust this limit according to your needs
            ->get()
            ->each(function ($typology) use ($restaurant) {
                $restaurant->typologies()->attach($typology);
            });
        });
    }
}