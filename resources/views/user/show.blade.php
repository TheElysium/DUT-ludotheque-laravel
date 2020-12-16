@extends('base.master')

<div>
	<div class="h1">
		<p>{{$user->name}}</p>
		<p>{{$user->email}}</p>
	</div>

</div>

@include('base.footer')


