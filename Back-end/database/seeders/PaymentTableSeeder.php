<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Payment;
use App\Models\Order;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seleziono 30 ordini casuali
        Order :: inRandomOrder() 
        -> limit(30)
        -> get()
        -> each(function($order) {
            // creo un pagamento associato a ciascun ordine
            $order -> payment() -> save(Payment :: factory() -> make());
        });
    }
}
