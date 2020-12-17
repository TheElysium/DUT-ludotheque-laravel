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
        <div class="form-group">
            <label for="date_achat">Date</label>
            <input type="date" class="form-control" id="date_achat" name="date_achat"
                   aria-describedby="dateHelp">
            <small id="dateHelp" class="form-text text-muted">date d'achat.</small>
        </div>

        <div class="form-group">
            <label for="jeu">Jeu</label>
            <select id="jeu" class="form-control" name="jeu_id">
                <option selected>Choose...</option>
                    @foreach(Auth::user()->jeuxNotInLudo() as $jeu)
                    <option value="{{$jeu->id}}">{{$jeu->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix" aria-describedby="prixHelp">
            <small id="prixHelp" class="form-text text-muted">prix d'achat.</small>
        </div>
        <div class="form-group">
            <label for="prix">Lieu</label>
            <input type="text" class="form-control" id="lieu" name="lieu" aria-describedby="lieuHelp">
            <small id="lieuHelp" class="form-text text-muted">lieu de stockage.</small>
        </div>

        <div class="flex justify-end">
            <button
                class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                type="submit">Valider
            </button>
        </div>
    </form>

@endsection
