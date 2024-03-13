@extends('layouts.app')
@section('content')

<h1 class="text-center">RESTAURANT</h1>
<a class="btn btn-success mt-2 ms-2" href="{{route('restaurant.create')}}">CREATE</a>
<ul>
    @foreach ($restaurants as $restaurant)
        <li>
            <a href="{{ route('restaurant.show', $restaurant -> id)}}">{{ $restaurant -> name }}</a>
            <form action="{{ route('restaurant.delete', $restaurant -> id)}}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger mt-2" type="submit" value="DELETE">
            </form>
            <a class="btn btn-warning mt-2" href="{{route('restaurant.edit', $restaurant -> id)}}">EDIT</a>
        </li>
    @endforeach
</ul>
@endsection