@extends('layouts.app')
@section('content')

    <div class="container-fluid m-0 p-0">
        <div class="jumbo">
            <div class="title d-flex justify-content-end align-items-center flex-column">
                <h1>Diventa un partner di DeliveBoo</h1>
                <p>Insieme possiamo aiutarti a raggiungere sempre più clienti</p>
                <a class="create" href="{{ route('register') }}">Crea un account</a>
            </div>
        </div>

        {{-- unisciti --}}
        <div class="community">
            <div class="row flex-wrap align-items-center justify-content-center">
                <h2 class="commuity-title text-center pt-5">Unisciti alla community di partner di DeliveBoo</h2>
                <div class="col-2">
                    <img src="{{asset('images/burger-king-4.svg')}}" alt="">
                </div>
                <div class="col-2">
                    <img src="{{asset('images/baja-fresh.svg')}}" alt="">
                </div>
                <div class="col-2">
                    <img src="{{asset('images/kfc-2.svg')}}" alt="">
                </div>
                <div class="col-2">
                    <img src="{{asset('images/five-guys-burgers.svg')}}" alt="">
                </div>
                <div class="col-2">
                    <img src="{{asset('images/wendys-1.svg')}}" alt="">
                </div>
            </div>
        </div>

        {{-- faq --}}
        <div class="accordion faq pb-5 mb-0" id="accordionExample">
            <h2 class="text-center mb-4">Domande Frequenti</h2>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Qual è la frequenza dei pagamenti?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Riceverai i pagamenti ogni giovedì. Per ulteriori informazioni sull'argomento, puoi consultare gli <strong class="colored">articoli relativi alle fatture e ai pagamenti disponibili</strong> nella sezione "Aiuto". <br><br>
                    Inoltre, dalla scheda "Aiuto" del <strong class="colored">Partner Hub</strong> puoi anche visualizzare le tue fatture e sollevare una questione in
                    relazione ai pagamenti.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Quanto tempo ho a disposizione per preparare gli ordini?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Quando configuri per la prima volta il tuo account su DeliveBoo, puoi impostare i tuoi tempi di preparazione su una delle modalità disponibili: "Tranquillo", "Moderato" o "Occupato". Poi, una volta che i tuoi ordini iniziano a essere consegnati, utilizzeremo i nostri sistemi di apprendimento automatico per impostare una tempistica più precisa. <br><br>

                    Il nostro algoritmo Frank aggiorna costantemente i tempi di preparazione del tuo ristorante, basandosi sui dati degli ordini relativi agli ultimi 14 giorni.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Qual é il raggio di consegna dei rider Deliveroo?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Ogni rider Deliveroo è assegnato a una determinata zona per far sì che le consegne non siano inutilmente lunghe. Le dimensioni della zona relativa al tuo locale possono aumentare o diminuire a seconda che tu decida di utilizzare i rider Deliveroo o i tuoi rider senza l'opzione Marketplace +. <br><br>

                    Sul <strong class="colored">Partner Hub</strong> puoi attivare l'opzione Marketplace+ e, se necessario, modificare manualmente il tuo raggio di consegna.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Cos'è il servizio di ritiro?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Il servizio di <strong>ritiro</strong> può essere attivato (e utilizzato in concomitanza con quello di <strong>consegna</strong>) senza bisogno di ulteriori investimenti o tecnologie. <br><br>

                    Il servizio di <strong>ritiro</strong> è un buon modo per far sì che i clienti visitino il tuo locale di persona. I clienti, infatti, potranno ritirare il proprio ordine direttamente dal tuo locale, risparmiando sui costi relativi alla consegna. Ciò, inoltre, potrebbe spingerli ad aumentare la frequenza con cui effettuano ordini da te. <br><br>
                    
                    Il servizio di <strong>consegna</strong> rimane la scelta più gettonata dai nostri clienti, i quali si affidano ai rider per ricevere l'ordine direttamente a casa o al proprio ufficio.
                </div>
              </div>
            </div>
        </div>
    </div>

    <style>
        .container-fluid{
            background-color: #e69c23;
        }
        .jumbo{
            height: calc(100vh - 80px);
            background-image: url('https://media.istockphoto.com/id/1227415751/it/foto/tavola-completa-dei-pasti-italiani-su-piatti-pizza-pasta-ravioli-carpaccio-insalata-caprese-e.jpg?s=612x612&w=0&k=20&c=tPnquQXg5trhf3_6gIhJZGDqirASYW-64zF6Ny78zVw=');
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
        }
        h1{
            font-weight: bold;
            font-size: 50px;
        }
        .jumbo p{
            font-size: 25px;
        }
        .title{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.389);
            padding-bottom: 170px;
        }
        .create{
            color: white;
            background-color: #e69c23;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 10px;
        }
        .create:hover{
            background-color: white;
            color: #e69c23;
            transition: 0.2s ease-in-out all;
        }
        .faq{
            width: 60%;
            margin: 50px auto;
        }
        .faq h2{
            color: white;
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
        .community{
            background-color: white;
            height: 500px;
            overflow: hidden;
        }
        .commuity-title{
            font-weight: bold;
            color: #e69c23;
        }

        .community .col-2{
            margin-top: -750px;
        }
        .community img{
            width: 100%;
        }

    </style>




{{-- mettere una landin page in cui si spiega come funziona deliverro per un ristoratore --}}
@endsection