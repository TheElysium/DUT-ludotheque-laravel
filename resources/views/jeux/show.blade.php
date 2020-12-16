@extends('base.master')
@section('content')

    {{--
   messages d'erreurs dans la saisie du formulaire.
--}}

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div>
        <div class="h1">{{$jeu->nom}}</div>

    </div>
    <div>
        <p>{{$jeu->description}}</p>
        <a href="{{route('regles', $jeu->id) }}">Regarder les règles du jeu</a>
        <p>{{$jeu->langue}}</p>
        <img src="{{$jeu->url_media}}" alt="Photo du jeu">
        <p>{{$jeu->age}}</p>
        <p>{{$jeu->nombre_joueurs}}</p>
        <p>{{$jeu->categorie}}</p>
        <p>{{$jeu->duree}}</p>
        <p>{{$jeu->editeur->nom}}</p>
        <p>{{$jeu->theme->nom}}</p>
    </div>

    <div class="h3">Ajouter une note</div>
    @if(\Illuminate\Support\Facades\Auth::check())
        @include('jeux.commentaires.create')
    @else
        <p>Connectez-vous pour poster un avis !</p>
    @endif

    <div class="h3">Commentaires</div>
    @include('jeux.commentaires.show',['commentaires' => $commentaires])

