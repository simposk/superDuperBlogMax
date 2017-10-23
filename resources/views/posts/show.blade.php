@extends('app')

@section('content')

<h1>{{ $post->title }}</h1>

<p class="post_text"> {{ $post->body }} </p>

<small>Written by <strong>{{ $post->user->name }}</strong></small>
<small> {{ $post->created_at->diffForHumans() }} </small>


@if (Auth::check() && $post->ownedBy($user))

<hr>

{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
	<div class="buttons">
		<a id="edit-button" href="{{$post->id}}/edit">Edit</a>
		<button id="delete-button" type="submit">Delete</button>
	</div>
	
	<a href="../posts">Back</a>
{!! Form::close() !!}

@else
	<br><a href="../posts">Back</a>
@endif

@stop