<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestautantStoreRequest;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\User;
use App\Models\Typology;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant :: all();

        return view('restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestautantStoreRequest $request)
    {
        $data = $request -> all();
        $newRestaurant = new Restaurant;
        $userId = Auth :: id();
       
        $newRestaurant -> name = $data['name'];
        $newRestaurant -> address = $data['address'];
        $newRestaurant -> vat_number = $data['vat_number'];
        $newRestaurant -> image = $data['image'];

        $newRestaurant -> user_id = $userId;
        $newRestaurant -> save();

        return redirect() -> route('restaurant.show', $newRestaurant -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant :: find($id);


        return view('restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant :: find($id);

        return view('restaurant.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestautantStoreRequest $request, $id)
    {
        $data = $request -> all();
        $restaurant = Restaurant :: find($id);
       
        $restaurant -> name = $data['name'];
        $restaurant -> address = $data['address'];
        $restaurant -> vat_number = $data['vat_number'];
        $restaurant -> image = $data['image'];

        $restaurant -> save();

        return redirect() -> route('restaurant.show', $restaurant -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant :: find($id);
        $restaurant -> dishes() -> each(function ($dish) {
            // elimino tutte le associazioni con gli ordini
            $dish -> orders() -> detach();
            // elimino il piatto
            $dish -> delete();
        });

        $restaurant -> delete();

        return redirect() -> route('restaurant.index');
    }
}
