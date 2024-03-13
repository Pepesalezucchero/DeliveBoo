<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Order;
use App\Models\Dish;

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
        -> count(15) 
        -> create()
        -> each(function ($order){
            $dishes = Dish :: inRandomOrder() -> limit(rand(1,5)) -> get();

            $order -> dishes() -> attach($dishes);

            $order -> save();
        });
    }
}
