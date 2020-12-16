@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{route('jeu_create')}}"><button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Ajouter un jeu</button></a>
            <a href="{{ URL::route('jeu_index', $sort) }}">Trier par nom @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>

        </div>
        <h1>Liste des jeux</h1>
        <table class="table-auto">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Theme</th>
                <th>Image</th>
                <th>Nombre joueurs</th>
                <th>Durée</th>
            </tr>
            </thead>
            <tbody>

            @foreach($jeux as $jeu)
                <tr>
                    <td>{{$jeu->nom}}</td>
                    <td>{{$jeu->theme->nom}}</td>
                    <td><img src="{{$jeu->url_media}}"></td>
                    <td>{{$jeu->nombre_joueurs}}</td>
                    <td>{{$jeu->duree}}</td>

                    <td>
                            <a href="{{route('jeu_show',[$jeu->id, 'action'=>'show'])}}"
                               class="bg-red-400 cursor-pointer rounded p-1 mx-1 text-white">
                                Détails
                            </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@yield('content')
