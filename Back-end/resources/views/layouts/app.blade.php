<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        {{--  --}}

        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="height: 80px;">
                    <div class="logo_deliveboo d-flex align-items-center justify-content-between">
                        <img src="{{asset('images/logodeliveboo.png')}}" alt="" style="height: 120px">
                        <h5 class="pt-1 ps-3 fs-3">Delive<span style="color: #e69c23">Boo</span> </h5>
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link btn ms-sm-0 ms-lg-4" href="{{url('/') }}">{{ __('Home') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link btn me-md-3 login" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link btn login" href="{{ route('register') }}">{{ __('Diventa nostro partner') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown" >
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item"  href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
<style>
    .btn{
        background-color: #e69c23;
        color: white;
        transition: .5s;
    }
    .navbar-expand-lg .navbar-nav .nav-link{
        padding: 8px 25px;
    }

    .btn:hover{
        background-color: #e69c23;
        color: #333;
    }
    
    @media all and (max-width:991px){

        .btn{
            background-color: #e3f2fd;
            color: #333;
            text-align: left;
           
        }
        .btn:hover{
        background-color: #e3f2fd;
        color: #e69c23;
       
    }
    }
   
</style>
</html>
