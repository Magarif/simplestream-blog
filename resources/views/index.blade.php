@extends('master')
@section('title', 'All posts')

@section('content')
    <div class="container">
        <br>
        <h3>Post List</h3>
        <hr>
        @if (!$posts->isEmpty())
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <strong>Created at:</strong> {{ $post->created_at }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text"><strong>Body:</strong> {{ $post->body }}</p>
                        <a href="{!! action('PostController@show', $post->slug) !!}" class="btn btn-primary">Show post</a>
                    </div>
                </div>
                <br>
            @endforeach
        @else
            <h5>There are no posts in db!</h5>
        @endif
    </div>
@endsection
