@extends('app')

@section('content')


<div class="container">
	<h1>Edit a post:</h1>

	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PATCH']) !!}
	    @include('posts.form')
	{!! Form::close() !!}

	<a href="/posts/{{ $post->id }}">Cancel</a>
</div>

@stop