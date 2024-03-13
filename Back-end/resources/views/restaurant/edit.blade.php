@extends('layouts.app')
@section('content')

<h1 class="text-center">RESTAURANT: {{$restaurant -> name}}</h1>

<form action="{{route('restaurant.update', $restaurant -> id)}}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nome</label>
    <input type="text" name="name" value="{{ $restaurant -> name }}">
    <br>

    <label for="address">Address</label>
    <input type="text" name="address" value="{{ $restaurant -> address }}">
    <br>

    <label for="vat_number">P.IVA</label>
    <input type="text" name="vat_number" value="{{ $restaurant -> vat_number }}">
    <br>

    <label for="image">Image</label>
    <input type="file" name="image">
    <br>

    <input type="submit" value="SALVA">

</form>

@endsection