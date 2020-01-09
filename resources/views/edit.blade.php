@extends('master')
@section('title', 'Edit post')

@section('content')
    <div class="container">
        <br>
        <h3>Edit post</h3>
        <hr>
        <div class="col-md-8">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <p>{{ $error }}</p>
                </div>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    <p>{{ session('status') }}</p>
                </div>
            @endif
            <form method="post">
                {{ csrf_field() }}
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Post title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="body">Post content</label>
                    <textarea rows="5" class="form-control" id="body" name="body" placeholder="Enter content">{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update post</button>
            </form>
        </div>
    </div>
@endsection
