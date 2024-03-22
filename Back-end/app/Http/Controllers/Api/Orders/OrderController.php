<?php

namespace App\Http\Controllers\Api\Orders;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Dish;
use App\Rules\ValidDish;
use App\Http\Resources\DishResource;

class OrderController extends Controller
{
    public function getOrders(Request $request, Gateway $gateway) {

        $token = $gateway -> clientToken() -> generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response() -> json($data, 200);
    }
    
    public function makePayments(OrderRequest $request, Gateway $gateway) {

        $dish = Dish :: find($request -> dish);

        $result = $gateway -> transaction() -> sale([
            'amount' => $dish -> price,
            'paymentMethodNonce' => $request -> token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result -> success){

            $data = [
                'success' => true,
                'message' => "Transazione eseguita con successo!"
            ];
            return response() -> json($data, 200);

        }else{

            $data = [
                'success' => false,
                'message' => "Transazione fallita!"
            ];
            return response() -> json($data, 401);
        }
    }
}
