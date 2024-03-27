@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">
            Bentornato {{ Auth::user()->name }}!
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="col-6">
                            <h3>In che modo DeliveBoo può aiutare la tua attività?</h3>
                            <p>Dopo la registrazione ti invieremo tutto il necessario per cominciare: una stampante wireless, un tablet e altri materiali segnaletici.</p>
                            <i class="fa-solid fa-check"></i><span>Assistenza per tablet 24 ore su 24</span><br>
                            <i class="fa-solid fa-check"></i><span>Piano di pagamento flessibile</span><br>
                            <i class="fa-solid fa-check"></i><span>Usa la rete di rider DeliveBoo o consegna autonomamente</span><br>
                            <i class="fa-solid fa-check"></i><span>Marketing della tua attività con risparmi su foto e siti web</span><br>
                        </div>
                        <div class="col-6">
                            <img class="img-rest" src="{{asset('images/dashboard-photo.avif')}}" alt="">
                        </div>
                        
                    </div>
                    <div class="text-center">
                        <a class="btn back my-2" href="{{route('restaurant.index')}}">Vai al tuo Ristorante</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-image: url('{{asset('images/bg.png')}}');
            padding-bottom: 30px;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
        h2{
            font-size: 35px;
            color: #e69c23;
        }
        .card{
            border-radius: 20px;
        }
        .img-rest{
            border-radius: 20px;
            width: 100%;
        }
        h3{
            font-size: 35px;
        }
        p,span{
            font-size: 18px;
        }
        .fa-solid{
            color:#e69c23;
            margin-right: 5px;
        }
        .btn.back{
            background-color: #e69c23;
            color: white;
        }
        .btn.back:hover{
            background-color: white;
            color: black;
            border: 1px solid #e69c23;
        }
    </style>
@endsection
