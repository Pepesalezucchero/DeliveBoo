<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\User;
use App\Models\Typology;
// use App\Models\Order;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant :: factory() 
        -> count(10) 
        -> make()
        -> each(function ($restaurant) {
            
            $user = User :: inRandomOrder() -> first();
            $typology = Typology :: inRandomOrder() -> first();
            // $orders = Order :: inRandomOrder() -> first();
            
            $restaurant -> user() -> associate($user);
            $restaurant -> typology() -> associate($typology);
            // $restaurant -> orders() -> associate($orders);
            
            $restaurant -> save();
        });
    }
}