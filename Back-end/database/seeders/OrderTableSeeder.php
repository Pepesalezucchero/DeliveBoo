<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Order;
use App\Models\Dish;
use App\Models\Restaurant;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order :: factory() 
            -> count(30) 
            -> create()
            -> each(function($order){
                $dishes = Dish :: inRandomOrder()
                -> limit(rand(1,10))
                -> get();

                $restaurant = Restaurant :: inRandomOrder() 
                -> first();

                $order -> dishes() -> attach($dishes);
                $order -> restaurant() -> associate($restaurant);

                $order -> save();
            });
    }
}
