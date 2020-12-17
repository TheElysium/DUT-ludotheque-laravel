@extends('base.master')
@section('content')
    @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}">
        {{session('message.content')}}
            </div>
    @endif
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <div class="container mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{URL::route('jeux.create')}}"><button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Ajouter un jeu</button></a>
            <a href="{{ URL::route('jeux.index', $sort) }}">Trier par nom @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>

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
                <x-carte :jeu="$jeu"/>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

