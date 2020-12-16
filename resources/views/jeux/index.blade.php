@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{route('jeux.create')}}"><button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Ajouter un smartphone</button></a>
        </div>
        <h1>Liste des jeux</h1>
        <table class="table-auto">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Theme</th>
                <th>Nombre joueurs</th>
                <th>Duree</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jeux as $jeu)
                <tr>
                    <td>{{$jeu->nom}}</td>
                    <td>{{$jeu->theme->nom}}</td>
                    <td>{{$jeu->nombre_joueurs}}</td>
                    <td>{{$jeu->duree}}</td>

                    <td>
                        @can('delete',$jeu)
                            <a href="{{route('jeux.show',[$jeu->id, 'action'=>'show'])}}"
                               class="bg-blue-400 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                        @else
                            <a href="{{route('jeux.show',[$jeu->id, 'action'=>'show'])}}"
                               class="bg-red-400 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@yield('content')
