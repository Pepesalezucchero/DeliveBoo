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
            -> create();
            // -> each(function($dish){
            //     $restaurants = Restaurant :: inRandomOrder() 
            //     -> limit(rand(1,5))
            //     -> get();

            //     $dish -> restaurants() -> attach($restaurants);
            //     $dish -> save();
            // });
    }
}
