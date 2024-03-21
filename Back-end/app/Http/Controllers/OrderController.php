<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function createOrder(OrderStoreRequest $request){
        $order = new Order();
        $order -> customer_name = $request -> input('name');
        $order -> customer_email = $request -> input('email');
        $order -> customer_phone = $request -> input('phone');
        $order -> save();

        foreach ($request -> input('dishes') as $dishData) {
            $order -> dishes() -> attach($dishData['dish_id'], ['quantity' => $dishData['quantity']]);
        }

        return response() -> json([
            'status' => 'success',
            'order' => $order
        ]);
    }
}
