@extends('master')
@section('title', 'Show post')

@section('content')
    <div class="container">
        <br>
        <h3>Detail view post</h3>
        <hr>
        <div class="content">
            <h2 class="header">{!! $post->title !!}</h2>
            <p>{!! $post->body !!}</p>
        </div>
        <div class="container">
            <div class="row">
                <a href="{!! action('PostController@edit', $post->slug) !!}" class="btn btn-primary pull-left">Edit post</a>
            </div>
        </div>
    </div>
@endsection
