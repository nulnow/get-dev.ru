@extends('layouts.app')

@section('content')

    <form action="/profile" method="POST" class="login-form">
        <h1>Your profile</h1>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ $user->img }}" name="img" class="mdl-textfield__input" type="text" id="img">
            <label class="mdl-textfield__label" for="img">Photo url</label>
            @if ($errors->has('img'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('img') }}</strong>
                    </span>
            @endif
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ $user->name }}" name="name" class="mdl-textfield__input" type="text" id="name">
            <label class="mdl-textfield__label" for="name">Name</label>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ $user->email }}" name="email" class="mdl-textfield__input" type="text" id="email">
            <label class="mdl-textfield__label" for="email">Email</label>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ $user->bio }}" name="bio" class="mdl-textfield__input" type="text" id="bio">
            <label class="mdl-textfield__label" for="email">Bio</label>
            @if ($errors->has('bio'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('bio') }}</strong>
                    </span>
            @endif
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ implode(', ', $user->getSkillsAsArray())}}" name="skills" class="mdl-textfield__input" type="text" id="skills">
            <label class="mdl-textfield__label" for="email">Skills</label>
            @if ($errors->has('skills'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('skills') }}</strong>
                    </span>
            @endif
        </div>
        <br>
        <!-- Accent-colored raised button with ripple -->
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Save
        </button>
    </form>

@endsection
