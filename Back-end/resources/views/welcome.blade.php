@extends('layouts.app')
@section('content')

    <style>


    body{
        background-image: url('https://images.unsplash.com/photo-1563865436914-44ee14a35e4b?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
    }

    .container-fluid{
        width: 95%
    }

    </style>

    <div class="container-fluid">
        <h1 class="text-center pt-5 text-light">Benvenuti su Deliveboo</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-sm-12 text-center my-5 my-md-0">
                <div class="card py-5" style="height:200px;">
                    <p style="height:100px;">Per vedere il tuo ristorante accedi qui</p>
                    <div class="">
                        <a class="btn w-50 btn-primary" href="{{route('login')}}">Accedi</a>
                    </div>
                    
                </div>
            
            </div>

            <div class="col-md-6 col-sm-12 text-center my-5 my-md-0">
                <div class="card py-5 px-3" style="height:200px;">
                    <p style="height:100px;">Per creare il tuo profilo da ristoratore e aggiungere il tuo ristorante registrati qui</p>
                    <div class="">
                        <a class="btn w-50 btn-primary" href="{{route('register')}}">Registrati</a>
                    </div>
                    
                </div>
            
            </div>
        </div>
    </div>




{{-- mettere una landin page in cui si spiega come funziona deliverro per un ristoratore --}}
@endsection