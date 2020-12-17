@extends('welcome')

@section('best')

<h1>5 Meilleurs jeux</h1>
<table>
@foreach($jeux as $jeu)
    @if(isset($jeu))
	<tr>
		<td>{{$jeu->nom}}</td>
		<td>{{$jeu->theme->nom}}</td>
		<td><img src="{{$jeu->url_media}}"></td>
		<td>{{$jeu->nombre_joueurs}}</td>
		<td>{{$jeu->duree}}</td>
	</tr>
    @endif
@endforeach
</table>

@endsection
