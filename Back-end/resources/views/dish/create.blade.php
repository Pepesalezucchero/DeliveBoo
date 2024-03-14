@extends('layouts.app')
@section('content')

<h1 class="text-center">Nuovo piatto:</h1>

@if ($errors -> any())
        <div class="alert alert-danger">
            <ul class="list-inline">
                @foreach ($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form action="{{route('dish.store')}}" method="POST">
    @csrf
    @method('POST')

    <label for="name">Nome</label>
    <input type="text" name="name">
    <br>

    <label for="description">Descrizione</label>
    <input type="text" name="description">
    <br>

    <label for="price">Prezzo:</label>
    <input type="text" name="price">
    <br>

    <label for="image">Immagine</label>
    <input type="file" name="image">
    <br>

    <input type="submit" value="CREA">

</form>

@endsection