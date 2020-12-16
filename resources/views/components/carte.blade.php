<div class="card">
    <div class="card-body">
        <img src={{$url_media}} alt="$nom">
        <h5 class="card-title">{{$nom}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$editeur}}</h6>
{{--        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
        <div class="d-flex p-2 bg-light">
            @foreach ($tags as $t)
                <span class="badge badge-pill badge-primary">{{$t}}</span>
            @endforeach
        </div>
    </div>
</div>
