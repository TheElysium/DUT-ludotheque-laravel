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

    <div class="h3">Ajouter une note</div>
    @if(\Illuminate\Support\Facades\Auth::check())
        <div>
            <div class="note">
                <input type="radio" id="note1" name="note" value="1" />
                <label for="note1" title="text">1</label>
                <input type="radio" id="note2" name="note" value="2" />
                <label for="note2" title="text">2</label>
                <input type="radio" id="note3" name="note" value="3" />
                <label for="note3" title="text">3</label>
                <input type="radio" id="note4" name="note" value="4" />
                <label for="note4" title="text">4</label>
                <input type="radio" id="note5" name="note" value="5" />
                <label for="note5" title="text">5</label>

            </div>

            {{-- Avis  --}}
            <label for="avis"><strong>Commentaire</strong></label>
            <input type="text" class="form-control" id="avis" name="avis"
                   value="{{ old('avis') }}">
        </div>
        <div>
            <button
                class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                type="submit">Valider
            </button>
        </div>
    @else
        <p>Connectez-vous pour poster un avis !</p>
    @endif


