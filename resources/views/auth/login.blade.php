@extends('layouts.app')

@section('content')

    <div class="container jumbotron">
        <form action="/login" method="POST" class="login-form block text">

            <h1>Login</h1>

            <label class="label">
                <span>Email</span>
                <input name="email" type="email">
            </label>

            <label class="label">
                <span>Password</span>
                <input type="password">
            </label>

            <button class="btn">Login</button>
        </form>
    </div>

@endsection
