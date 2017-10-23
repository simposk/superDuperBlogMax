@extends('app')

@section('content')

<h1>{{ $post->title }}</h1>

<p class="post_text"> {{ $post->body }} </p>

<small>Written by <strong>{{ $post->user->name }}</strong> on</small>
<small> {{ $post->created_at->diffForHumans() }} </small>


@if (Auth::check() && $post->ownedBy($user))

<hr>

{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
	<a href="../posts">Back</a>
	<a href="{{$post->id}}/edit">Edit</a>
	<button class="delete" type="submit">Delete</button>
{!! Form::close() !!}

@else
	<br><a href="../posts">Back</a>
@endif

@stop