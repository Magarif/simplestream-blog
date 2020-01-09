@extends('master')
@section('title', 'Show post')

@section('content')
    <div class="container">
        <br>
        <h3>Detail view post</h3>
        <hr>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <p>{{ $error }}</p>
            </div>
        @endforeach
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="content">
            <h2 class="header">{!! $post->title !!}</h2>
            <p>{!! $post->body !!}</p>
        </div>
        <div class="container">
            <div class="row">
                <a href="{!! action('PostController@edit', $post->slug) !!}" class="btn btn-primary pull-left">Edit post</a>&nbsp;
                <form method="post" action="{!! action('PostController@destroy', $post->slug) !!}" class="pull-left">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <div>
                        <button type="submit" class="btn btn-dark">Delete post</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <h3>Comments</h3>
        @foreach($comments as $comment)
            <div class="card">
                <div class="card-body">
                    {!! $comment->text !!}
                </div>
            </div>
            <br>
        @endforeach
        <hr>
        @if(Auth::check())
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="/comment">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{!! $post->id !!}">
                        <div class="form-group">
                            <label for="text"><strong>Post Comment</strong></label>
                            <textarea rows="3" class="form-control" id="text" name="text" placeholder="Enter comment"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
