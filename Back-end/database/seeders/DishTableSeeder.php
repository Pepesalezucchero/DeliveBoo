<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dish;
use App\Models\Restaurant;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dish :: factory() 
        -> count(15) 
        -> make()
        -> each(function($dish){
            
            $restaurant = Restaurant :: inRandomOrder() -> first();

            $dish -> restaurant() -> associate($restaurant);

            $dish -> save();
        });
    }
}
