@extends('layouts.app')
@section('content')

    <h2 class="text-center mt-4">Nuovo piatto:</h2>

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
                <input type="text" minlength="3" maxlength="20" name="name" class="form-control" required> 
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="description"><strong>Descrizione *</strong></label>
                    <textarea type="text" name="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="price"><strong>Prezzo: </strong><em>(in euro)</em> *</label>
                    <input type="text" name="price" inputmode="numeric" pattern="[0-9]+(\.[0-9]{1,2})?" inputmode="numeric" title="only numbers will be accepted" class="form-control" required>
                </div>

            <div class="row mb-3">
                <h5>Disponibile *</h5>
                <div class="d-flex justify-content-center">
                    <input class="me-1" type="radio" name="visible" id="visible" value="1" checked>
                    <label class="me-4" for="visible">Si</label>

                    <input class="me-1" type="radio" name="visible" id="visible" value="0"> 
                    <label for="visible">No</label>
                    </div>
                </div>
            </div>
                    
            <div class="my-3 mx-3">
                <label class="form-label" for="image"><strong>Immagine</strong></label>
                <input class="form-control" type="file" name="image" accept="image/png, image/jpeg">
            </div>
            <div class="py-3">
                <input class="btn btn-success w-25" type="submit" value="Salva">
            </div>
            <div class="text-end mb-2 me-2">
                <em>* campo richiesto</em>
            </div>
        </div>
    </form>

    <style>
        body{
            background-image: url('{{asset('images/bg.png')}}');
            padding-bottom: 30px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .card{
            border-radius: 20px;
        }
        h2{
            font-size: 40px;
            color: #e69c23;
        }
        .btn-success{
            background-color: #e69c23;
            border: none;
            color: white;
        }
        .btn-success:hover{
            background-color: #e69c23;
            border: none;
            color: white;
        }
    </style>
@endsection