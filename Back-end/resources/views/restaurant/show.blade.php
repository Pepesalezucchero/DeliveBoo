@extends('layouts.app')
@section('content')

    @if (Auth::check() && Auth::user()->id === $restaurant->user_id)
        

    @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, qualcosa è andato storto...</h1>
            <a class="btn btn-primary" href="{{route('restaurant.show', Auth :: user() -> id === $restaurant -> user_id)}}">Torna al tuo ristorante</a>
        </div>
    @endif  
@endsection