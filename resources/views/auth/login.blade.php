@extends('master')
@section('title', 'Login user')

@section('content')
    <div class="container">
        <br>
        <h3>Login user</h3>
        <hr>
        <div class="col-md-6">
            <form method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <hr>
            <p>Don't have an account? Then register <a href="/auth/register">here!</a></p>
        </div>
    </div>
@endsection
