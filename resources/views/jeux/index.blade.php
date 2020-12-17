@extends('base.master')
@section('content')
    @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}">
        {{session('message.content')}}
            </div>
    @endif
{{--    <script type="text/javascript" src="{{ asset('js/filtre.js') }}"></script>--}}
    <div class="container mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{route('jeux.create')}}"><button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Ajouter un jeu</button></a>
            <a href="{{ URL::route('jeux.index', $sort) }}">Trier par nom @if ($filter !== null)<i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i> @endif</a>
            <span style="margin-left: 5%;"><label for="filter_theme">Filtrer par thème...</label><select name="filter_theme" id="filter_theme" onchange="filtre.call('theme', this)"></select></span>
            <span style="margin-left: 5%;"><label for="filter_editeur">Filtrer par éditeur...</label><select name="filter_editeur" id="filter_editeur" onchange="filtre.call('editeur', this)"></select></span>
            <span style="margin-left: 5%;"><label for="filter_mecanique">Filtrer par mécanique...</label><select name="filter_mecanique" id="filter_mecanique" onchange="filtre.call('tag', this)"></select></span>
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

    <script>
        window.onload = function() {
            var filter_theme_array = [];
            var filter_editeur_array = [];
            var filter_mecanique_array = [];
            var cartes = document.getElementsByClassName("carte");

            for (let c = 0; c < cartes.length; c++) {
                const carte = cartes.item(c);
                let theme = carte.getElementsByClassName("theme")[0].innerText;
                if (!(filter_theme_array.includes(theme))) {
                    filter_theme_array.push(theme);
                }
                let editeur = carte.getElementsByClassName("editeur")[0].innerText;
                if (!(filter_editeur_array.includes(editeur))) {
                    filter_editeur_array.push(editeur);
                }
                let mecaniques = carte.getElementsByClassName("tag");
                for (let m = 0; m < mecaniques.length; m++) {
                    const mecanique = mecaniques.item(m).innerText;
                    if (!(filter_mecanique_array.includes(mecanique))) {
                        filter_mecanique_array.push(mecanique);
                    }
                }
            }
            var filter_theme = document.getElementById("filter_theme");
            for (let filter of filter_theme_array) {
                let option = document.createElement("option");
                option.innerText = filter;
                filter_theme.appendChild(option);
            }
            var filter_editeur = document.getElementById("filter_editeur");
            for (let filter of filter_editeur_array) {
                let option = document.createElement("option");
                option.innerText = filter;
                filter_editeur.appendChild(option);
            }
            var filter_mecanique = document.getElementById("filter_mecanique");
            for (let filter of filter_mecanique_array) {
                let option = document.createElement("option");
                option.innerText = filter;
                filter_mecanique.appendChild(option);
            }
        }

        function filtre(option) {
            var cartes = document.getElementsByClassName("carte");
            var classe = {"filter_theme" : "theme", "filter_editeur" : "editeur", "filter_mecanique" : "tag"}[option.id];
            for (let carte of cartes) {
                carte.style.display = "block";
                var found = false;
                for (let e of carte.getElementsByClassName(classe)) {
                    // if (option === e.innerText) {
                    if (option.options[option.selectedIndex].innerText === e.innerText) {
                        found = true; break;
                    }
                }
                if (!found) carte.style.display = "none";
            }
        }

    </script>
@endsection

