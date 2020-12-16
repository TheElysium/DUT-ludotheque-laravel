@extends('base.master')
@section('content')

    <div class="h1">{{$jeu->nom}}</div>
    <p>{{$jeu->regles}}</p>

    <a href="{{route('jeux.show',[$jeu->id, 'action'=>'show'])}}">Retour au jeu</a>

    <a href="{{route('jeux.index') }}">Retour à la liste des jeux</a>



