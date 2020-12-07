<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

</head>


<body style="padding-top: 50px;" class="bg-green-400 font-sans leading-normal tracking-normal">

@section('navbar')
<nav class="bg-green-800 navbar navbar-expand-md navbar-dark  fixed-top">
    <a class="navbar-brand" href="{{ URL::route('home') }}">Ludotheque</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::route('dashboard') }}">dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::route('jeu_index') }}">Jeux</a>
            </li>
        </ul>
        <ul class="my-2 my-lg-0 navbar-nav">
            @guest
                <li class="my-2 my-sm-0"><a class="btn btn-success" href="{{ URL::route('login') }}">Login</a></li>
            @endguest
            @auth
                    <li class="my-2 my-lg-0"><!-- Authentication --><span class="text-white">{{ Auth::user()->name }}</span>
                    <form  method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            <span class="text-white">{{ __('Logout') }}</span>
                        </x-jet-dropdown-link>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>
@show


<main role="main" class="container">

    <div class="starter-template" style="padding-top: 40px;">

        @yield('content')

    </div>

</main>

@section('js')

    <script src="{{ asset('js/app.js')}}"></script>

@show

</body>
</html>
