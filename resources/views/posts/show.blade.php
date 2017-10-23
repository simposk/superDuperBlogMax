@extends('app')

@section('content')

<h1>{{ $post->title }}</h1>

<p class="post_text"> {{ $post->body }} </p>



@if($post->was_updated)
	<small>
		Updated by <strong>{{ $post->user->name }}</strong>
		{{ $post->updated_at->diffForHumans() }} 
	</small>
@else
	<small>
		Written by <strong>{{ $post->user->name }}</strong>
		{{ $post->created_at->diffForHumans() }} 
	</small>
@endif



@if (Auth::check() && $post->ownedBy($user))

<hr>

{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
	<div class="buttons">
		<a id="edit-button" href="{{$post->id}}/edit">Edit</a>
		<button id="delete-button" type="submit">Delete</button>
	</div>
{!! Form::close() !!}
@endif

@stop