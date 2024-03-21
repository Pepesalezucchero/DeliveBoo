<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\Dish;

class ApiController extends Controller
{
    public function getUsers() {

        $users = User :: all();

        return response() -> json([
            'status' => 'success',
            'users' => $users
        ]);
    }

    public function getRestaurants() {

        // $restaurants = Restaurant :: all();
        $restaurants = Restaurant :: with('typologies', 'dishes') -> get();

        return response() -> json([
            'status' => 'success',
            'restaurants' => $restaurants
        ]);
    }

    public function getTypologies() {

        $typologies = Typology :: all();

        return response() -> json([
            'status' => 'success',
            'typologies' => $typologies
        ]);
    }

    public function getDishes() {

        // $dishes = Dish :: with('orders') -> get();
        $dishes = Dish::with(['orders' => function ($query) {
            $query->withPivot('quantity'); // Recupera la quantità dalla tabella ponte
        }])->get();

        return response() -> json([
            'status' => 'success',
            'dishes' => $dishes
        ]);
    }

    public function getRestaurantDishes($id) {
        // Recupera il ristorante dal database utilizzando l'ID
        $restaurant = Restaurant::find($id);
    
        // Recupera i piatti associati a questo ristorante
        $dishes = $restaurant->dishes;
    
        return response()->json([
            'status' => 'success',
            'restaurant' => $restaurant,
            'dishes' => $dishes
        ]);
    }
}
