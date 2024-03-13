@extends('layouts.app')
@section('content')

<h1 class="text-center">RESTAURANT: {{$restaurant -> name}}</h1>
<p>Address: {{$restaurant -> address}}</p>
<p>P.IVA: {{$restaurant -> vat_number}}</p>
<img src="{{$restaurant -> image}}" alt="immagine ristorante {{$restaurant -> name}}">

@endsection