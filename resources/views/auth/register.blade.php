@extends('master')
@section('title', 'Register user')

@section('content')
    <div class="container">
        <br>
        <h3>Register user</h3>
        <hr>
        <div class="col-md-6">
            <form method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password confirmation</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-type Password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <hr>
            <p>Already have an account? Then login <a href="/auth/login">here!</a></p>
        </div>
    </div>
@endsection
