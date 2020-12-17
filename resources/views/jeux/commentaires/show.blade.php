<div class="container-fluid">
    @foreach($commentaires as $commentaire)
        <div class="offset-1 col-4" style="margin-bottom: 2vh;">
            <div class="card">
                <div class="card-body">
                    <div class="card-subtitle" style="color: grey">{{$commentaire->date_com}}</div>
                    <div class="card-title" style="font-size: 1vw" >{{\App\Models\User::find($commentaire->user_id)->name}}</div>
                    <div class="card-text">{{$commentaire->commentaire}}</div>
                    <br>
                    <div>Note: </div>
                    @for($i=0; $i<$commentaire->note; $i++)
                        <img src="{{asset("images/logo_rancho_notext.png")}}" style="width:1vw";></img>
                    @endfor
                </div>
            </div>
        </div>
    @endforeach
</div>
