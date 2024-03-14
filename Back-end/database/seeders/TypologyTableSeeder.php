<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Typology;
use App\Models\Restaurant;

class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Typology :: factory()
        -> count(8) 
        -> create()
        -> each(function ($typology){
            $restaurants = Restaurant :: inRandomOrder() -> limit(rand(1,3)) -> get();

            $typology -> restaurants() -> attach($restaurants);

            $typology -> save();
        });
    }
}
