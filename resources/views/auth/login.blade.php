@extends('layouts.app')

@section('content')

    <div class="container jumbotron">
        <form action="/login" method="POST" class="login-form block text">

            <h1>Login</h1>

            <label class="label">
                <span>Email</span>
                <input name="email" type="email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </label>

            <label class="label">
                <span>Password</span>
                <input name="password" type="password">
            </label>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <button class="btn">Login</button>
        </form>
    </div>

@endsection
