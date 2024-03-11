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

                $order -> dishes() -> attach($dishes);
                
                $order -> save();


                // SQLSTATE[HY000]: General error: 1364 Field 'restaurant_id' doesn't have a default value (SQL: insert into `orders` (`name`, `updated_at`, `created_at`) values (ut, 2024-03-11 16:47:15, 2024-03-11 16:47:15))
            });
    }
}
