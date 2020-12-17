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
            <select name="Filtrer par thème..." id="filter_theme" onchange="filtreTheme.call(this.options[this.selectedIndex].text)"></select>
            <select name="Filtrer par éditeur..." id="filter_editeur" onchange="filtreEditeurs.call(this.options[this.selectedIndex].text)"></select>
            <select name="Filtrer par mécanique..." id="filter_mecanique" onchange="filtreMecaniques.call(this.options[this.selectedIndex].text)"></select>
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
                let theme = carte.getElementsByClassName("theme")[0].innerHTML;
                if (!(filter_theme_array.includes(theme))) {
                    filter_theme_array.push(theme);
                }
                let editeur = carte.getElementsByClassName("editeur")[0].innerHTML;
                if (!(filter_editeur_array.includes(editeur))) {
                    filter_editeur_array.push(editeur);
                }
                let mecaniques = carte.getElementsByClassName("tag");
                for (let m = 0; m < mecaniques.length; m++) {
                    const mecanique = mecaniques.item(m).innerHTML;
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

        function filtreMecaniques(...mecaniques) {
            var cartes = document.getElementsByClassName("carte");
            for (let carte of cartes) {
                carte.style.display = "block";
                var found = false;
                for (let tag of carte.getElementsByClassName("tag")) {
                    alert(tag.innerHTML)
                    if (mecaniques.includes(tag.innerHTML)) {
                        found = true; break;
                    }
                }
                if (!found) carte.style.display = "none";
            }
        }

        function filtreEditeurs(...editeurs) {
            var cartes = document.getElementsByClassName("carte");
            for (let carte of cartes) {
                carte.style.display = "block";
                var found = false;
                for (let editeur of carte.getElementsByClassName("editeur")) {
                    if (editeurs.includes(editeur.innerHTML)) {
                        found = true; break;
                    }
                }
                if (!found) carte.style.display = "none";
            }
        }

        function filtreTheme(...themes) {
            var cartes = document.getElementsByClassName("carte");
            for (let carte of cartes) {
                carte.style.display = "block";
                var found = false;
                for (let theme of carte.getElementsByClassName("theme")) {
                    if (themes.includes(theme.innerHTML)) {
                        found = true; break;
                    }
                }
                if (!found) carte.style.display = "none";
            }
        }

    </script>
@endsection

