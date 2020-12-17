@extends('base.master')
@section('content')

    <h1>{{$jeu->nom}}</h1>

    <p>{{$jeu->regles}}</p>

    <a href="{{route('jeux.show',[$jeu->id, 'action'=>'show'])}}">Retour au jeu</a>
    <br/>
    <a href="{{route('jeux.index') }}">Retour à la liste des jeux</a>

@endsection

