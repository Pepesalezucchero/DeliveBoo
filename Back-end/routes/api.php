<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;

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

        Route::get('restaurants/{id}/dishes', [ApiController::class, 'getRestaurantDishes'])
        ->name('api.restaurant.dishes');
});


