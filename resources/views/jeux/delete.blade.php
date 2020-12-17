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

<form action="{{route('jeux.delete')}}" enctype="multipart/form-data" method="post">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Suppression d'un Jeu</h3>
        <hr class="mt-2 mb-2">
    </div>
    {{-- Jeu  --}}
    <label for="editeur"><strong>Nom du Jeu</strong></label>
    <select name="jeu" id="jeu">
    @foreach($jeux as $jeu)
        <option value="{{ $jeu->id }}">
            {{ $jeu->nom }}
        </option>
    @endforeach
    </select>
    <div>
    <div class="flex justify-end">
        <button
            class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
            type="submit">Valider
        </button>
    </div>
</form>

@endsection
