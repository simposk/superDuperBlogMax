@extends('app')

@section('content')

<h1>Welcome to my blog!</h1>
<h5 style="line-height: 20px">The goal is to create basic functionality <br> in order to practise my laravel programming skills</h5>

<hr>

<h1>Posts:</h1>


<div class="post">

	@foreach($posts as $post)
	<h2>
		<a href="posts/{{$post->id}}">{{ $post->title }}</a>
	</h2>
	<p>{{ substr($post->body, 0, 140) }}...</p>
	<small> <em>Written by <strong>{{ $post->user->name }} </strong>  on</em> {{ $post->created_at->diffForHumans() }}</small>
	<hr>

	@endforeach
</div>


@stop