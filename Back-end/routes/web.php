<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DishController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth') -> group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RISTORANTI
    Route::get('/restaurant', [RestaurantController :: class, 'index'])
    -> name('restaurant.index');

    Route::delete('/restaurant/{id}', [RestaurantController :: class, 'destroy'])
        -> name('restaurant.delete');

    Route::get('/restaurant/{id}/edit', [RestaurantController :: class, 'edit'])
        -> name('restaurant.edit');

    Route::put('/restaurant/{id}/edit', [RestaurantController :: class, 'update'])
        -> name('restaurant.update');

    Route::get('/restaurant/create', [RestaurantController :: class, 'create'])
        -> name('restaurant.create');

    Route::post('/restaurant/create', [RestaurantController :: class, 'store'])
        -> name('restaurant.store');

    Route::get('/restaurant/orders', [RestaurantController :: class, 'showOrders'])
        -> name('restaurant.orders');

    Route::get('/restaurant/{id}', [RestaurantController :: class, 'show'])
        -> name('restaurant.show');


    // PIATTI
    Route::delete('/dish/{id}', [DishController :: class, 'destroy'])
        -> name('dish.delete');

    Route::get('/dish/{id}/edit', [DishController :: class, 'edit'])
        -> name('dish.edit');

    Route::put('/dish/{id}/edit', [DishController :: class, 'update'])
        -> name('dish.update');

    Route::get('/dish/create', [DishController :: class, 'create'])
        -> name('dish.create');

    Route::post('/dish/create', [DishController :: class, 'store'])
        -> name('dish.store');

    Route::get('/dish/{id}', [DishController :: class, 'show'])
        -> name('dish.show');
});

require __DIR__.'/auth.php';


