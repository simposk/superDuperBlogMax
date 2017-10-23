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
	
	<hr>

	@endforeach
</div>


@stop