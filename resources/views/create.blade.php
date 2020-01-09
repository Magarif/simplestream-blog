@extends('master')
@section('title', 'Create post')

@section('content')
    <div class="container">
        <br>
        <h3>Create post</h3>
        <hr>
        <div class="col-md-8">
            <form method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Post title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="body">Post content</label>
                    <textarea rows="5" class="form-control" id="body" name="body" placeholder="Enter content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create post</button>
            </form>
        </div>
    </div>
@endsection
