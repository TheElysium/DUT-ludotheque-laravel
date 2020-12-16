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

<form action="{{route('jeux.store')}}" method="POST">
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
        <label for="langue"><strong>Réseau</strong></label>
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
        {{--  URL Média  --}}
        <label for="url_media"><strong>URL Média</strong></label>
        <input type="text" class="form-control" id="url_media" name="url_media"
               value="{{ old('url_media') }}">
    </div>




</form>

