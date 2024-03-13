@extends('layouts.app')
@section('content')

<h1 class="text-center">dish: {{$dish -> name}}</h1>
<p>price: {{$dish -> price}}</p>
<p>description: {{$dish -> description}}</p>
<img src="{{ $dish -> image}}" alt="piatto: {{ $dish -> name }}">


@endsection