@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7">
            <h1>Accedi per vedere tutte le informazioni sul tuo ristorante</h1>
            <div class="card">

                <div class="card-body">
                    <form id="loginForm" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" onclick="validateForm()" class="btn btn-primary">
                                    {{ __('Accedi') }}
                                </button>

                                <p id="errorMessage" class="text-danger d-none mt-2">
                                    Per favore, compila tutti i campi obbligatori.
                                </p>

                                <div class="text-end mb-2 me-2">
                                    <em>* campo richiesto</em>
                                </div>

                                @if (Route::has('password.request'))
                                <a class="btn-link forgot" href="{{ route('password.request') }}">
                                    {{ __('Hai dimenticato la Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-5">
            <div class="card photo-card">
                <img src="{{asset('images/rest-login.avif')}}" alt="">
            </div>
        </div>
    </div>
</div>

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
    .photo-card{
        margin-top: 80px;
    }
    .photo-card img{
        border-radius: 20px;
        overflow: hidden;
    }
    .btn-primary{
        background-color: #e69c23;
        border: none;
    }
    .btn-primary:hover{
        background-color: #e69c23;
        border: none;
    }
    .btn-link.forgot{
        background-color: white;
        color: black;
    }
    .btn-link.forgot:hover{
        background-color: white;
        color: #e69c23;
    }
</style>

<script>
    function validateForm() {
        
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // controllo se i campi sono vuoti
        // la funzione .trim() rimuove gli spazi vuoti inutili
        if (email.trim() === '' || password.trim() === '') {
            document.getElementById('errorMessage').classList.remove('d-none');
            return false;
        }

        document.getElementById('loginForm').submit();
    }
</script>
@endsection
