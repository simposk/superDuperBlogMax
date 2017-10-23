@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Dashboard</h2>
                    <small><em>Post count:</em> {{ count($posts) }}</small>
                </div>
                <div class="panel-body">
                    @if(count($posts) > 0)
                
                    <ul class="dashboard">
                        @foreach($posts as $post)
                            <li>
                                <h3>{{ $post->title }}</h3>
                                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                    <div class="buttons-dash">
                                        <a id="edit-button" href="/posts/{{$post->id}}/edit">Edit</a>
                                        <button id="delete-button" type="submit">Delete</button>
                                    </div>
                                {!! Form::close() !!}
                            </li>
                        @endforeach
                    </ul>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
