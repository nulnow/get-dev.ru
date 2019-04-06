@extends('layouts.app')

@section('content')
<div class="container jumbotron">
    <form action="/register" method="POST" class="login-form block text">

        <h1>Register</h1>

        <label class="label">
            <span>Name</span>
            <input name="name" value="{{ old('name') }}" type="text" required>
        </label>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

        <label class="label">
            <span>Email</span>
            <input name="email" value="{{ old('email') }}" type="email" required>
        </label>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label class="label">
            <span>Password</span>
            <input name="password" type="password" required>
        </label>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <label class="label">
            <span>Repeat password</span>
            <input name="password_confirmation" type="password" required>
        </label>

        <button class="btn">Register</button>
    </form>
</div>

@endsection
