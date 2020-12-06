@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <h1 class="text-center">Tous les jeu de la super ludotheque de l'IUT de Lens</h1>
    <hr>
    <a href="{{ URL::route('jeu_index', $sort) }}">Trié par nom</a>
    <div class="row">


        @foreach ($jeux as $jeu)
            <div class="col-4">
                <div class="card">
                    <img src="{{ $jeu->url_media }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jeu->nom }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($jeu->description, 50, $end='...') }}<br/>
                        <hr>
                            {{ $jeu->theme->nom }}
                        <hr>
                            durée : {{ $jeu->duree }}
                        <hr>
                            Nombre de joueur : {{ $jeu->nombre_joueurs }}
                        </p>
                        <a href="{{ URL::route('jeu_show', $jeu->id) }}" class="btn btn-primary">Plus d'info</a>
                    </div>
                </div>
            </div>

    @endforeach


@endsection
