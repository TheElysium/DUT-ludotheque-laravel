@extends('base.master')

@section('content')

{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


<div>
    <a href="{{ route('user.jeux') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Ma collection</a>
	<a href="{{ route('user.promptdelete') }}">Supression d'un jeu</a>
</div>
<div>
	<div>
		@if(session()->has('message.level'))
			<div class="alert alert-{{ session('message.level') }}">
				{{session('message.content')}}
			</div>
		@endif
		<p><span class="label label-default">Nom</span>: {{$user->name}}</p>
		<p><span class="label label-default">E-mail</span>: {{$user->email}}</p>
	</div>

</div>

@endsection
