<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dish;
use App\Models\Restaurant;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $restaurantId = $user -> restaurant -> id;

        $data = $request -> all();

        $newDish = new Dish;

        $newDish -> name = $data['name'];
        $newDish -> description = $data['description'];
        $newDish -> price = $data['price'];
        $newDish -> image = $data['image'];

        $newDish -> restaurant_id = $restaurantId;

        $newDish -> save();

        return redirect() -> route('dish.show', $newDish->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish :: find($id);
    
        $restaurant = $dish -> restaurant;
    
        return view('dish.show', compact('dish', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish :: find($id);

        return view('dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();
        $dish = Dish :: find($id);
       
        $dish -> name = $data['name'];
        $dish -> description = $data['description'];
        $dish -> price = $data['price'];
        $dish -> image = $data['image'];

        $dish -> save();

        return redirect() -> route('dish.show', $dish -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish :: find($id);
        $restaurant = Restaurant :: find($id);

        $dish -> orders() -> detach();

        $dish -> delete();
        return redirect() -> route('restaurant.show',$dish -> restaurant_id);
    }
}
