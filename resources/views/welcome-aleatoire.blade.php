@extends('welcome')

@section('aleatoire')

	<h1>5 Jeux Aléatoires</h1>
	<table>
	@foreach($jeux as $jeu)
		<tr>
			<td>{{$jeu->nom}}</td>
			<td>{{$jeu->theme->nom}}</td>
			<td><img src="{{$jeu->url_media}}"></td>
			<td>{{$jeu->nombre_joueurs}}</td>
			<td>{{$jeu->duree}}</td>
		</tr>
	@endforeach
	</table>

@endsection
