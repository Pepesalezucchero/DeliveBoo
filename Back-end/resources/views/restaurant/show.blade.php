@extends('layouts.app')
@section('content')

<h1 class="text-center">RESTAURANT: {{$restaurant -> name}}</h1>
<p>Address: {{$restaurant -> address}}</p>
<p>P.IVA: {{$restaurant -> vat_number}}</p>
<img src="{{$restaurant -> image}}" alt="immagine ristorante {{$restaurant -> name}}">

<h2>Piatti:</h2>
<ul>
    @foreach ($restaurant -> dishes as $dish)
       <li>
            <a href=" {{route ('dish.show', $dish -> id) }}">{{ $dish -> name }}</a>
            <br>
            {{ $dish -> visible }}
            <br>
            {{ $dish -> image }}
            <br>
            <form action="{{ route('dish.delete', $dish->id) }}" method="POST">

                @csrf
                @method('DELETE')

                <input type="submit" value="Cancella piatto" class="btn btn-danger mt-2">
            </form>
       </li>
        
    @endforeach
</ul>


@endsection