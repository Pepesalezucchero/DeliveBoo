@extends('layouts.app')
@section('content')

    <div class="container text-center mt-3">
        <h1 class="my-2">Ops, non hai l'autorizzazione per accedere a questa pagina.</h1>
        <a class="btn btn-primary" href="{{ route('restaurant.index') }}">Torna al tuo ristorante</a>
    </div>

@endsection