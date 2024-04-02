@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-between align-content-stretch">
            <div class="col-12 col-md-7">
                <h1>Fai crescere la tua attività online con DeliveBoo</h1>
                <p>Registrati e diventa un partner. Vendi di più, aumenta le tue entrate e gestisci la tua attività online insieme a noi. Il tuo percorso di digitalizzazione inizia qui.</p>
                <div class="card">

                    <div class="card-body">
                        @if ($errors -> any())
                            <div class="alert alert-danger">
                                <ul class="list-inline">
                                    @foreach ($errors -> all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4 row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required pattern="^.{8,}$" title="La password deve essere di almeno 8 " oninput="checkPasswordMatch()" >
                                    <span id="passwordMatch" class="invalid-feedback" style="display: none;">
                                        La password non coincide.
                                    </span>
                                </div>
                            </div>

                            <h4 class="restaurant">Il tuo Ristorante</h4>
                            

                            <div class="mb-4 row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text" class="form-control" name="restaurant_name" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva*') }}</label>

                                <div class="col-md-6">
                                    <input id="vat_number" type="text" required inputmode="numeric" pattern="[0-9]+" maxlength="11" minlength="11" class="form-control" name="vat_number" title="Il campo accetta solo numeri">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" accept="image/png, image/jpeg">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="typologies" class="col-md-4 col-form-label text-md-right">{{ __('Tipologia*') }}</label>

                                <div class="col-md-6">
                                    @foreach ($typologies as $typology)
                                        <div>
                                            <input type="checkbox" name="typologies[]" value="{{ $typology -> id }}" required>
                                            <label for="tag{{ $typology -> id}}">{{ $typology -> name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                            <div class="text-end mb-2 me-2">
                                <em>* campo richiesto</em>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block col-md-5">
                <div class="card photo-card">
                    <img src="{{asset('images/rest-team.avif')}}" alt="">
                </div>
            </div>
        </div>
    </div>

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



        function checkPasswordMatch() {
        var passwordInput = document.getElementById("password");
        var passwordConfirmationInput = document.getElementById("password_confirmation");
        var passwordMatchSpan = document.getElementById("passwordMatch");

        if (passwordInput.value !== passwordConfirmationInput.value) {
            passwordMatchSpan.style.display = "block";
            passwordConfirmationInput.setCustomValidity("Passwords do not match");
        } else {
            passwordMatchSpan.style.display = "none";
            passwordConfirmationInput.setCustomValidity("");
        }
    }
    </script>

    <style>
        body{
            background-image: url('{{asset('images/bg.png')}}');
            padding-bottom: 30px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            font-size: 55px;
            font-weight: bold;
            margin-top: 80px;
            margin-bottom: 30px;
            color: #e69c23;
        }
        .card{
            border-radius: 20px;
        }
        p{
            font-size: 20px;
            margin-bottom: 30px;
        }
        .photo-card{
            margin-top: 80px;
        }
        .photo-card img{
            border-radius: 20px;
            overflow: hidden;
        }
        .restaurant{
            padding-bottom: 20px;
            font-size: 20px;
            color: #e69c23;
        }
        .btn-primary{
            background-color: #e69c23;
            border: none;
        }
        .btn-primary:hover{
            background-color: #e69c23;
            border: none;
        }
    </style>
    

@endsection
