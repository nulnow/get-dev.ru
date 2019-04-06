@extends('layouts.app')

@section('content')
    <form action="/login" method="POST" class="login-form">
        <h1>Login</h1>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="email" class="mdl-textfield__input" type="text" id="email">
            <label class="mdl-textfield__label" for="email">Email</label>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="password" class="mdl-textfield__input" type="password" id="password">
            <label class="mdl-textfield__label" for="password">Password</label>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <!-- Accent-colored raised button with ripple -->
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Login
        </button>
    </form>
@endsection
