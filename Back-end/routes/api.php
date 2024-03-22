<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\Orders\OrderController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\RestaurantOrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route :: group(['prefix' => '/deliveboo'], function() {

    Route :: get('users', [ApiController :: class, 'getUsers']);
        // -> name('api.users');

    Route :: get('restaurants', [ApiController :: class, 'getRestaurants']);
        // -> name('api.restaurants');

    Route :: get('typologies', [ApiController :: class, 'getTypologies']);
        // -> name('api.typologies');

    Route :: get('dishes', [ApiController :: class, 'getDishes']);
        // -> name('api.dishes');

    Route :: get('orders', [RestaurantOrderController :: class, 'getOrders']);

    Route :: post('orders', [RestaurantOrderController :: class, 'store']);

    Route :: get('restaurants/{name}/dishes', [ApiController::class, 'getRestaurantDishes'])
    ->name('api.restaurant.dishes');

});

Route :: get('orders', [OrderController :: class, 'getOrders']);

Route :: post('payments', [OrderController :: class, 'makePayments']);

Route :: get('payDishes', [DishController :: class, 'index']);


