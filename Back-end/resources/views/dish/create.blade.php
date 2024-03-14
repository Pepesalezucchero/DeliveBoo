@extends('layouts.app')
@section('content')

<h1 class="text-center">Piatto:</h1>

<form action="{{route('dish.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <label for="name">Nome</label>
    <input type="text" name="name">
    <br>

    <label for="description">description</label>
    <input type="text" name="description">
    <br>

    <label for="price">prezzo:</label>
    <input type="text" name="price">
    <br>

    <label for="image">Image</label>
    <input type="file" name="image" accept="image/*">
    <br>

    <input type="submit" value="CREA">

</form>

@endsection