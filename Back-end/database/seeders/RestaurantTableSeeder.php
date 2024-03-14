<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\User;

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
            $user -> restaurant() -> save(Restaurant :: factory() -> make());
        });
    }
}