@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-3">I tuoi ordini:</h2>
    @foreach ($orders->sortByDesc('date') as $order)
        @php 
            $totalAmount = 0; 
            $orderContainsRestaurantDishes = false;
        @endphp

        @foreach ($order->dishes as $index => $dish)
            @if ($dish->pivot->quantity > 0 && $dish->restaurant_id == Auth::user()->restaurant->id)
                @php 
                    $totalAmount += $dish->pivot->quantity * $dish->price; 
                    $orderContainsRestaurantDishes = true;
                @endphp
            @endif
        @endforeach

        @if ($totalAmount > 0 && $orderContainsRestaurantDishes)
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Cliente: {{ $order->customer_name }}</h5>
                    <p class="card-text">Ordine effettuato il: {{ $order->date }}</p>
                    <p class="card-text">Telefono: {{ $order->customer_phone }}</p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Piatto</th>
                                <th>Quantità</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->dishes as $dish)
                                @if ($dish->pivot->quantity > 0 && $dish->restaurant_id == Auth::user()->restaurant->id)
                                    <tr>
                                        <td>{{ $dish->name }}</td>
                                        <td>{{ $dish->pivot->quantity }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <p class="card-text"><strong>Totale: {{ $totalAmount }} €</strong></p>
                </div>
            </div>
        @endif
    @endforeach
</div>
@endsection
