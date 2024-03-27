@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="mb-3 mt-3">
            <a class="btn back" href="{{route('restaurant.index')}}"><i class="fa-solid fa-arrow-left"></i> Torna al Ristorante</a>
        </div>
        <h2 class="text-center mt-4">Nuovo piatto</h2>
    
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
    
            <div class="shadow-sm card mx-auto mt-4 form-width">
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
                    <input class="btn btn-save w-25" type="submit" value="Salva">
                </div>
                <div class="text-end mb-2 me-2">
                    <em>* campo richiesto</em>
                </div>
            </div>
        </form>
    </div>
    

    <style>
        body{
            background-image: url('{{asset('images/bg.png')}}');
            padding-bottom: 30px;
            background-repeat: no-repeat;
            background-size: cover;
            padding-top: 100px;
        }
        .card{
            border-radius: 20px;
        }
        h2{
            font-size: 35px;
            color: #e69c23;
        }
        .btn-save{
            background-color: #e69c23;
            border: none;
            color: white;
        }
        .btn-save:hover{
            background-color: #e69c23;
            border: none;
            color: white;
        }
        .form-width{
            width: 100%;
        }
        .btn.back{
            border: 1px solid #e69c23;
        }
        .btn.back:hover{
            background-color: #e69c23;
            color: white;
            transition: all ease-in-out 0.2s;;
        }
        @media all and (min-width:993px){
            .form-width{
                width: 50%;
            }
        }
        @media all and (max-width:576px){
            .btn.back{
                border: 1px solid #e69c23;
                margin-left: 10px;
             }
        }
    </style>
@endsection