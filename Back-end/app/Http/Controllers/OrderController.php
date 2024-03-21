<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order :: all();

        return response() -> json([
            'status' => 'success',
            'orders' => $orders
        ]);
    }

    public function store(Request $request)
    {
        // Ricevi i dati inviati tramite la richiesta POST
        $address = $request->input('address');
        $date = $request->input('date');
        $amount = $request->input('amount');
        $customerName = $request->input('customer_name');
        $customerEmail = $request->input('customer_email');
        $customerPhone = $request->input('customer_phone');
        $dishes = $request->input('dishes');

        // Crea una nuova istanza di Order e assegna i dati ricevuti
        $newOrder = new Order;
        $newOrder->address = $address;
        $newOrder->date = $date;
        $newOrder->amount = $amount;
        $newOrder->customer_name = $customerName;
        $newOrder->customer_email = $customerEmail;
        $newOrder->customer_phone = $customerPhone;

        // Salva l'ordine nel database
        $newOrder->save();

        // Allega i piatti all'ordine utilizzando il metodo attach()
        $newOrder->dishes()->attach($dishes);

        // Restituisci una risposta JSON di successo
        return response()->json([
            'status' => 'success',
            'order' => $newOrder,
        ]);
    }
}
