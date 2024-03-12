<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Payment;

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
        -> make()
        -> each(function($order){
            // limit -> mette dagli 1 a 5 piatti per ordine
            $restaurant = Restaurant :: inRandomOrder() -> limit(rand(1,7)) -> first();

            $order -> restaurant() -> associate($restaurant);

            $order -> save();
        });
    }
}
