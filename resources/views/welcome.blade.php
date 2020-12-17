@extends('base.master')

{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="navbar-header">--}}
{{--            <a class="navbar-brand" href="#">--}}
{{--                <img src="{{ URL::asset('images/logo_rancho_notext.png') }}" width="40" height="40" alt="">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <ul class="nav navbar-nav">--}}
{{--            <li class="nav-item"><a href="{{ route('jeux.index') }}" class="nav-link no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Jeux</a></li>--}}
{{--        @auth--}}
{{--                <li class="nav-item"><a href="{{ route('welcome', ['options' => 'rand']) }}" class="nav-link">5 Jeux aléatoires</a></li>--}}
{{--                <li class="nav-item"><a href="{{ route('welcome', ['options' => 'best']) }}" class="nav-link">5 Meilleurs jeux</a></li>--}}
{{--            </ul>--}}
{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Dashboard</a></li>--}}
{{--                <li class="nav-item"><a href="{{ url('profil') }}" class="nav-link no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Profil</a></li>--}}
{{--            </ul>--}}
{{--        @else--}}
{{--            </ul>--}}
{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                @if (Route::has('register'))--}}
{{--                    <li class="nav-item"><a href="{{ route('register') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">--}}
{{--                        <span class="glyphicon glyphicon-user"></span>Enregistrement--}}
{{--                    </a></li>--}}
{{--                @endif--}}
{{--                <li class="nav-item"><a href="{{ route('login') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">--}}
{{--                    <span class="glyphicon glyphicon-log-in"></span> Connexion--}}
{{--                </a></li>--}}
{{--            </ul>--}}
{{--        @endauth--}}
{{--    </div>--}}
{{--</nav>--}}

@yield('aleatoire')
@yield('best')

{{--@include('base.footer')--}}

