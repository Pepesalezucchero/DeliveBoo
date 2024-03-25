<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class RestaurantOrderController extends Controller
{
    public function index(){
        $orders = Order :: with('dishes') -> get();
        $user_id = Auth::id();

        return view('restaurant.orders', compact('orders'));
    }

    public function getOrders(){
        $orders = Order :: with('dishes') -> get();

        return response() -> json([
            'status' => 'success',
            'orders' => $orders
        ]);
    }

    public function store(Request $request)
    {
        $address = $request -> input('address');
        $date = $request -> input('date');
        $amount = $request -> input('amount');
        $customerName = $request -> input('customer_name');
        $customerEmail = $request -> input('customer_email');
        $customerPhone = $request -> input('customer_phone');
        // $dishes = $request -> input('dishes');

        $newOrder = new Order;
        $newOrder -> address = $address;
        $newOrder -> date = $date;
        $newOrder -> amount = $amount;
        $newOrder -> customer_name = $customerName;
        $newOrder -> customer_email = $customerEmail;
        $newOrder -> customer_phone = $customerPhone;
        // $newOrder -> dishes = $dishes;

        $newOrder -> save();

        // $newOrder -> dishes() -> attach($dishes);

        return response() -> json([
            'status' => 'success',
            'order' => $newOrder,
        ]);
    }
}
