@extends('app')

@section('content')


<div class="container">
	<h1>Create new post:</h1>

	{!! Form::open(['route' => ['posts.store'], 'method' => 'POST']) !!}
		@include('posts.form')
	{!! Form::close() !!}

	<a href="/">Cancel</a>
</div>

@stop