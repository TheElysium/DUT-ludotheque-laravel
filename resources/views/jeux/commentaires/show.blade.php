@foreach($commentaires as $commentaire)
    <p>Nom: {{\App\Models\User::find($commentaire->user_id)->name}}</p>
    <p>Date: {{$commentaire->date_com}}</p>
    <p>Commentaire: {{$commentaire->commentaire}}</p>
    <p>Note: {{$commentaire->note}}/5</p>
@endforeach
