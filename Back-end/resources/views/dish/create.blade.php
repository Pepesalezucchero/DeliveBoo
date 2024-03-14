@extends('layouts.app')
@section('content')

<h1 class="text-center mt-4">Nuovo piatto:</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-inline">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('dish.store') }}" method="POST" enctype="multipart/form-data" class="text-center">
    @csrf
    @method('POST')

    <div class="shadow-sm card w-50 mx-auto mt-4">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="name"><strong>Nome</strong> *</label>
                <input type="text" name="name" class="form-control"> 
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="description"><strong>Descrizione *</strong></label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="price"><strong>Prezzo:</strong> *</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="visible"><strong>Disponibile:</strong> *</label> <br>
                <select name="visible" id="visible" class="text-center" style="width: 100px">
                    <option value="1" selected>Si</option>
                    <option value="0">No</option>
                </select>
            </div>            
            
            <div class="mb-3">
                <label class="form-label" for="image"><strong>Immagine</strong></label>
                <input class="form-control" type="file" name="image" accept="image/*">
            </div>

            <div class="py-3">
                <input class="btn btn-success w-25" type="submit" value="CREA">
            </div>
        </div>
        <div class="text-end mb-2 me-2">
            <em>* campo richiesto</em>
        </div>
    </div>
</form>

@endsection