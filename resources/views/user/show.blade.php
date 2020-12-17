@extends('jeux.index')

<div>
    <a href="{{ route('user.jeux') }}" class="no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Ma collection</a>
</div>
<div>
	<div class="h1">
		<p>{{$user->name}}</p>
		<p>{{$user->email}}</p>
	</div>

</div>

@include('base.footer')


