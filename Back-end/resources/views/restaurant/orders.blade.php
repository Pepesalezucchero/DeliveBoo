@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-3 mb-2 order-title">I tuoi ordini:</h2>
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
            <div class="card mb-3 rounded-20">
                <div class="card-header">
                    <h5 class="card-title"><i class="fa-solid fa-user"></i> {{ $order->customer_name }}</h5>
                    <p class="card-text"><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($order->date)->format('d/m/Y') }}</p>
                    <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{ $order->address }}</p>
                    <p class="card-text"><i class="fa-solid fa-phone"></i> {{ $order->customer_phone }}</p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Piatto</th>
                                <th>Quantità</th>
                                <th>Prezzo unitario</th>
                                <th>Prezzo totale</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->dishes as $dish)
                                @if ($dish->pivot->quantity > 0 && $dish->restaurant_id == Auth::user()->restaurant->id)
                                    <tr>
                                        <td>{{ $dish->name }}</td>
                                        <td>{{ $dish->pivot->quantity }}</td>
                                        <td>{{ $dish->price }} €</td>
                                        <td>{{ $dish->price * $dish->pivot->quantity }} €</td>
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

<style>
    body {
        background-image: url('{{asset('images/bg.png')}}');
        padding-bottom: 30px;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .order-title {
        color: #e69c23;
        font-size: 35px;
    }
    .card {
        border-radius: 20px;
    }
    .card-header:first-child{
        border-radius: 20px 20px 0 0;
    }
    .card-header .fa-solid{
        color: #e69c23;
        margin-right: 5px;
    }
</style>
@endsection
