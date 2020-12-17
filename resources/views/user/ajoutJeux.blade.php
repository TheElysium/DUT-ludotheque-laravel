{{--
   messages d'erreurs dans la saisie du formulaire.
--}}
@extends('base.master')
@section('content')

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('user.storeJeux')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Ajout d'un jeu</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            {{-- Nom  --}}
            <label for="Nom"><strong>Nom</strong></label>
            <input type="text" class="form-control" id="nom" name="nom"
                   value="{{ old('nom') }}">
        </div>
        <div>
            {{-- Thème  --}}
            <label for="theme"><strong>Thème</strong></label>
            <select name="theme" id="theme">
                @foreach($themes as $theme)
                    <option value = "{{$theme->id}}">{{$theme->nom}}</option>
                @endforeach
            </select>
        </div>
        <div>
            {{-- Description  --}}
            <label for="description"><strong>Description</strong></label>
            <input type="text" class="form-control" id="description" name="description"
                   value="{{ old('description') }}">
        </div>
        <div>
            {{-- Regles  --}}
            <label for="regles"><strong>Règles</strong></label>
            <input type="text" class="form-control" id="regles" name="regles"
                   value="{{ old('regles') }}">
        </div>
        <div>
            {{-- Langue (checkbox) --}}
            <label for="langue"><strong>Langue</strong></label>
            <div>
                <label for="francais">FR</label>
                <input type="checkbox" name="langue" id="francais" value="francais">
            </div>

            <div>
                <label for="anglais">EN</label>
                <input type="checkbox" name="langue" id="anglais" value="anglais">
            </div>
        </div>
        <div>
            {{--  URL Média  --}}
            <label for="url_media"><strong>URL Média</strong></label>
            <input type="text" class="form-control" id="url_media" name="url_media"
                   value="{{ old('url_media') }}">
        </div>
        <div>
            {{--  Age  --}}
            <label for="age"><strong>Age</strong></label>
            <input type="text" class="form-control" id="age" name="age"
                   value="{{ old('age') }}">
        </div>
        <div>
            {{-- Nombre de joueurs --}}
            <label for="nombre_joueurs"><strong>Nombre de joueurs</strong></label>
            <input type="text" class="form-control" id="nombre_joueurs" name="nombre_joueurs"
                   value="{{ old('nombre_joueurs') }}">
        </div>
        <div>
            {{-- Catégorie --}}
            <label for="categorie"><strong>Catégorie</strong></label>
            <input type="text" class="form-control" id="categorie" name="categorie"
                   value="{{ old('nb_joueurs') }}">
        </div>
        <div>
            {{-- Durée de la partie --}}
            <label for="duree"><strong>Durée de la partie</strong></label>
            <input type="text" class="form-control" id="duree" name="duree"
                   value="{{ old('duree') }}">
        </div>
        <div>
            {{-- Editeur  --}}
            <label for="editeur"><strong>Thème</strong></label>
            <select name="editeur" id="thediteureme">
                @foreach($editeurs as $editeur)
                    <option value = "{{$editeur->id}}">{{$editeur->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button
                class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                type="submit">Valider
            </button>
        </div>
    </form>

@endsection
