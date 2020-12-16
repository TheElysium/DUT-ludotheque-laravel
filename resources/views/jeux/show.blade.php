@extends('base.master')
@section('content')
    <div>
        <div class="h1">{{$jeu->nom}}</div>

    </div>
    <div>
        <p>{{$jeu->description}}</p>
        <p>{{$jeu->regles}}</p>
        <p>{{$jeu->langue}}</p>
        <img src="{{$jeu->url_media}}" alt="Photo du jeu">
        <p>{{$jeu->age}}</p>
        <p>{{$jeu->nombre_joueurs}}</p>
        <p>{{$jeu->categorie}}</p>
        <p>{{$jeu->duree}}</p>
        <p>{{$jeu->editeur->nom}}</p>
        <p>{{$jeu->theme->nom}}</p>

    </div>
