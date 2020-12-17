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

<div class="container-fluid">
    <div>
        <h1 style="font-size: 5em; font-weight: bold;">{{$jeu->nom}}</div>
    </div>
    <div>
        <h3 style="font-weight: bold;">Description</h3>
        <div style="font-size:1.5em;">{{$jeu->description}}</div>
        <h3 style="font-weight: bold;"><a href="{{route('regles', $jeu->id) }}">Regles</a></h3>
        <h3 style="margin-bottom: 1vh; font-weight: bold;">Image du jeu</h3>
        <img src="{{asset("images/$jeu->url_media")}}" alt="Photo du jeu">
        <p style="color: dimgrey">Editeur: {{$jeu->editeur->nom}}</p>
        <p style="color: dimgrey">Langue: {{$jeu->langue}}
        <p style="color: dimgrey">Age: {{$jeu->age}}</p>
        <p style="color: dimgrey">Nombre de joueurs: {{$jeu->nombre_joueurs}}</p>
        <p style="color: dimgrey">Catégorie: {{$jeu->categorie}}</p>
        <p style="color: dimgrey">Durée d'une partie: {{$jeu->duree}}</p>
        <p style="color: dimgrey">Thème: {{$jeu->theme->nom}}</p>
    </div>
    
    <div style="float: right;">
    <h3 class="h3">Statistiques</h3>
    @include('jeux.statistiques.show', ['note_moyenne' => $note_moyenne, 'note_minimum' => $note_minimum, 'note_maximum' => $note_maximum,
            'nombre_commentaires' => $nombres_commentaires, 'nombre_commentaires_ttl' => $nombres_commentaires_ttl])

    <div class="h3 center">Informations tarifaires</div>
    @include('jeux.tarif', ['prix_moyen' => $prix_moyen, 'prix_minimum' => $prix_minimum, 'prix_maximum' => $prix_maximum,
            'nombre_users' => $nombre_users, 'user_total_site' => $user_total_site])
    </div>
    <h3>Ajouter une note</h3>
    @if(\Illuminate\Support\Facades\Auth::check())
        @include('jeux.commentaires.create')
    @else
        <p>Connectez-vous pour poster un avis !</p>
    @endif
    </div>

    <div class="h3">Commentaires</div>
    @include('jeux.commentaires.show',['commentaires' => $commentaires])
<<<<<<< HEAD
@endsection
