@extends('base.master')

@auth
	<a href="{{ route('dashboard') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Dashboard</a>
    <a href="{{ route('welcome', 'rand') }}">5 Jeux aléatoires</a>
	<a href="{{ url('profil') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Profil</a>
@else
	<a href="{{ route('login') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Connexion</a>
	@if (Route::has('register'))
		<a href="{{ route('register') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Enregistrement</a>
	@endif
@endauth

@yield('aleatoire')

@include('base.footer')
