@extends('layouts.app')
@section('content')

    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="jumbo col-12 d-flex flex-wrap align-items-center justify-content-center flex-column">
                    <h1 class="text-center">Diventa un partner di DeliveBoo</h1>
                    <p class="text-center">Insieme possiamo aiutarti a raggiungere sempre più clienti</p>
                     <a class="btn btn-success border-0" href="{{ route('register') }}">Crea un account</a>
            </div>
        </div>
        <section class="p-0 m-0 w-100 pb-5">
            <div class="container">
                {{-- growth --}}
                <h2 class="growth-title text-center pt-5 mb-5">Ti aiutiamo a far crescere la tua attività</h2>
                <div class="row justify-content-center flex-wrap align-items-center gy-4">
                    <div class="col-12 col-md-6">
                        <img class="marketing-img" src="{{asset('images/marketing.avif')}}" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>Marketing DeliveBoo</h4>
                        <p class="marketing-text">Promuoviamo la tua attività a clienti locali tramite l'app.</p>
                        <p class="marketing-text">Senza alcun costo aggiuntivo potrai anche partecipare a campagne pubblicitarie via email o social media. Ottimizziamo anche la tua visibilità su Google.</p>
                    </div>
                    
                    <div class="d-none d-md-block col-md-6">
                        <h4>Raggiungi nuovi clienti</h4>
                        <p class="marketing-text">Non esiste un cliente "tipico" di DeliveBoo.</p>
                        <p class="marketing-text">Il numero di persone che utilizza la nostra app cresce di giorno in giorno e ciò ti consente di ricevere sempre più ordini da consegnare. Attiva anche il servizio di ritiro dell'ordine per portare i clienti direttamente al tuo ristorante.</p>
                    </div>
                    <div class="d-none d-md-block col-md-6">
                        <img class="marketing-img" src="{{asset('images/marketing-offer.avif')}}" alt="">
                    </div>
                    {{-- responsive --}}
                    <div class="col-12 d-md-none">
                        <img class="marketing-img" src="{{asset('images/marketing-offer.avif')}}" alt="">
                    </div>
                    <div class="col-12 d-md-none ">
                        <h4>Raggiungi nuovi clienti</h4>
                        <p class="marketing-text">Non esiste un cliente "tipico" di DeliveBoo.</p>
                        <p class="marketing-text">Il numero di persone che utilizza la nostra app cresce di giorno in giorno e ciò ti consente di ricevere sempre più ordini da consegnare. Attiva anche il servizio di ritiro dell'ordine per portare i clienti direttamente al tuo ristorante.</p>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <img class="marketing-img" src="{{asset('images/marketing-food.avif')}}" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>Offerte promozionali</h4>
                        <p class="marketing-text">Crea un'offerta happy hour per dare una svolta ai giorni feriali in cui ricevi meno ordini. I nostri partner utilizzano Marketer per generare più ordini nelle giornate più tranquille e fidelizzare la clientela con offerte lampo o periodiche.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>  

    <style>
         section{
            background-image: url('{{asset('images/bg.png')}}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container-fluid{
            overflow: hidden;
        }
        .brand{
            max-width: 150px;
        }
        .jumbo{
            background-image: url('https://images.unsplash.com/photo-1652862730477-8082e33a7b45?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-repeat: no-repeat;
            background-size: cover;
            background-position-y: 24%;
            color: white;
            height: calc(100vh - 95px);
        }
        h1{
            font-weight: bold;
            font-size: 50px;
        }
        .jumbo p{
            font-size: 25px;
        }
        .create{
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 10px;
            background-color: #e69c23;
            transition: 1s;
        }
        .create:hover{ 
            color: #333;
         
        }
        .growth-title,.faq-title{
            color: #e69c23; 
            font-size: 45px;
        }
        .marketing-img{
            width: 100%;
            border-radius: 20px;
        }
        .marketing-text{
            font-size: 25px;
        }
        h4{
            font-size: 35px;
        }
        .faq{
            width: 60%;
            margin: 130px auto 0;
        }
        .faq,.faq-title{
            color: #fff;
            font-weight: bold;   
        }
        .accordion-item{
            --bs-accordion-btn-bg: none;
            --bs-accordion-btn-focus-box-shadow: none;
            --bs-accordion-active-bg: none;
        }
        .accordion-body{
            border-top: 1px solid var(--bs-border-color);;
        }
        .colored{
            color: #e69c23;
        }
       
        .community-title{
            font-weight: bold;
            color: white;
            font-size: 45px;
        }
        @media all and (max-width:992px){
            .community-title{
                color: #e69c23;
            }
        }
    </style>
@endsection