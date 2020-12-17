@foreach($commentaires as $commentaire)
    <p class="center">Nom: {{\App\Models\User::find($commentaire->user_id)->name}}</p>
    <p class="center">Date: {{$commentaire->date_com}}</p>
    <p class="center">Commentaire: {{$commentaire->commentaire}}</p>
    <p class="center">Note: {{$commentaire->note}}/5</p>
@endforeach
