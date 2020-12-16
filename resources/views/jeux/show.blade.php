@extends('base.master')
@section('content')
    <div>
        <div class="h1">{{$jeu->nom}}</div>

    </div>
    <div>
        <p>{{$jeu->description}}</p>
        <a href="{{route('regles', $jeu->id) }}">Regarder les régles du jeu</a>
        <p>{{$jeu->langue}}</p>
        <img src="{{$jeu->url_media}}" alt="Photo du jeu">
        <p>{{$jeu->age}}</p>
        <p>{{$jeu->nombre_joueurs}}</p>
        <p>{{$jeu->categorie}}</p>
        <p>{{$jeu->duree}}</p>
        <p>{{$jeu->editeur->nom}}</p>
        <p>{{$jeu->theme->nom}}</p>

    </div>



