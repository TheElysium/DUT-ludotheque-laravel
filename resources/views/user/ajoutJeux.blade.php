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
            <h3>Ajouter un jeu</h3>
            <hr class="mt-2 mb-2">
        </div>

        <div>
            {{-- Jeu  --}}
            <label for="jeu"><strong>Jeu</strong></label>
            <select name="jeu" id="jeu">
                @foreach($jeux as $jeu)
                    <option value = "{{$jeu->id}}">{{$jeu->nom}}</option>
                @endforeach
            </select>
        </div>

        <div>
            {{-- Date d'achat --}}
            <label for="date"><strong>Date d'achat</strong></label>
            <input type="text" class="form-control" id="date" name="date"
                   value="{{ old('date') }}">
        </div>

        <div>
            {{-- Lieu de stockage --}}
            <label for="lieu"><strong>Lieu de stockage</strong></label>
            <input type="text" class="form-control" id="lieu" name="lieu"
                   value="{{ old('lieu') }}">
        </div>


        <div>
            {{-- Prix --}}
            <label for="prix"><strong>Prix d'achat</strong></label>
            <input type="text" class="form-control" id="prix" name="prix"
                   value="{{ old('prix') }}">
        </div>

        <div class="flex justify-end">
            <button
                class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                type="submit">Valider
            </button>
        </div>
    </form>

@endsection
