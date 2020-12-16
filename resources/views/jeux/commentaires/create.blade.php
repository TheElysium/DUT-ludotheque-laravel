
<form action="{{route('commentaires.store',[$jeu->id])}}" method="POST">
    {!! csrf_field() !!}

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
        <label for="commentaire"><strong>Commentaire</strong></label>
        <input type="text" class="form-control" id="commentaire" name="commentaire"
               value="{{ old('avis') }}">
    </div>
    <div>
        <button
            class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
            type="submit">Valider
        </button>
    </div>
</form>
