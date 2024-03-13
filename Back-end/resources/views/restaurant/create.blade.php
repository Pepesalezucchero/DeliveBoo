@extends('layouts.app')
@section('content')

<h1 class="text-center">RESTAURANT:</h1>

<form action="{{route('restaurant.store')}}" method="POST">
    @csrf
    @method('POST')

    <label for="name">Nome</label>
    <input type="text" name="name">
    <br>

    <label for="address">Address</label>
    <input type="text" name="address">
    <br>

    <label for="vat_number">P.IVA</label>
    <input type="text" name="vat_number">
    <br>

    <label for="image">Image</label>
    <input type="file" name="image">
    <br>

    <input type="submit" value="CREA">

</form>

@endsection