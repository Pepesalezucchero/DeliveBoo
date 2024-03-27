@extends('layouts.app')
@section('content')

    @if (Auth::check() && Auth::user()->id === $restaurant->user_id)

        @if ($errors -> any())
            <div class="alert alert-danger">
                <ul class="list-inline">
                    @foreach ($errors -> all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <a class="btn back" href="{{route('restaurant.index')}}"><i class="fa-solid fa-arrow-left"></i> Torna al Ristorante</a>
        </div>
        <h2 class="text-center">Modifica Ristorante</h2>
        <form action="{{route('restaurant.update', $restaurant -> id)}}" method="POST" class="container text-center" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="shadow-sm card mx-auto my-4 form-width">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Nome ristorante *</strong></label>
                        <input type="text" class="form-control" name="name" placeholder="Inserisci Nome Ristorante"  value="{{ $restaurant -> name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><strong>Indirizzo del tuo ristorante *</strong></label>
                        <input type="text"  class="form-control" name="address" placeholder="inserisci l'indirizzo del tuo ristorante" required value="{{ $restaurant -> address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="vat_number" class="form-label"><strong>Inserisci la partita IVA *</strong></label>
                        <input type="text" inputmode="numeric" minlength="11" maxlength="11" pattern="[0-9]+(\.[0-9]{1,2})?" class="form-control" title="only numbers will be accepted" name="vat_number" placeholder="Inserisci la tua partita IVA" value="{{ $restaurant -> vat_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label"><strong>Modifica l'immagine del tuo ristorante *</strong></label>
                        <input type="file" class="form-control" name="image" placeholder="Scegli un file" accept="image/png, image/jpeg">
                    </div>
                    <h3 class="mt-3 mb-2">Tipologie:</h3>
                    @foreach ($typologies as $typology)
                        <div>
                            <input type="checkbox" name="typologies[]" value="{{ $typology -> id }}" value="{{$typology -> name}}"

                                @foreach ($restaurant -> typologies as $typologyTag)
                                    @if ($typologyTag -> id == $typology -> id)
                                        checked
                                    @endif
                                @endforeach

                            >
                            <label for="typology{{ $typology -> id}}">{{ $typology -> name }}</label required>
                        </div>
                    @endforeach
                    <div class="row justify-content-around pt-4">
                        <div class="col-sm-12 col-xl-4 w-100">
                            <input class="btn btn-warning " type="submit" value="Salva">
                        </div>
                    </div>
                </div>
                <div class="text-end m-2">
                    <em>* campo obbligatorio</em>
                </div>
            </div>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="typologies[]"]');
                const submitButton = document.querySelector('button[type="submit"]');
        
                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener("change", function() {
                        const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"][name="typologies[]"]:checked');
                        if (checkedCheckboxes.length > 0) {
                            checkboxes.forEach(function(checkbox) {
                                checkbox.removeAttribute("required");
                            });
                        } else {
                            checkboxes.forEach(function(checkbox) {
                                checkbox.setAttribute("required", "");
                            });
                        }
                    });
                });
            });
        </script>
            
    @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, non hai l'autorizzazione per accedere a questa pagina.</h1>
            <a class="btn btn-primary" href="{{route('restaurant.show', Auth::user()->id === $restaurant->user_id)}}">Torna al tuo ristorante</a>
        </div>
    @endif

    <style>
        body{
            background-image: url('{{asset('images/bg.png')}}');
            padding-bottom: 30px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h2{
            color: #e69c23;
            font-size: 35px;
        }
        .card{
            border-radius: 20px;
        }
        .btn.back{
            border: 1px solid #e69c23;
            margin-left: 80px;
        }
        .btn.back:hover{
            background-color: #e69c23;
            color: white;
            transition: all ease-in-out 0.2s;;
        }
        .btn-warning{
            background-color: #e69c23;
            border: none;
            color: white;
        }
        .btn-warning:hover{
            background-color: #e69c23;
            border: none;
            color: white;
        }
        .form-width{
            width: 100%;
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
