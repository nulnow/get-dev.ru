@extends('layouts.app')

@section('title', 'Create task')

@section('content')
    <form action="/tasks" method="POST" class="login-form">
        <h3>Create task</h3>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ old('title') }}" name="title" class="mdl-textfield__input" type="text" id="title">
            <label class="mdl-textfield__label" for="title">Title</label>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
            @endif
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ old('img') }}" name="img" class="mdl-textfield__input" type="text" id="img">
            <label class="mdl-textfield__label" for="img">Img url</label>
            @if ($errors->has('img'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('img') }}</strong>
                    </span>
            @endif
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="{{ old('description') }}" name="description" class="mdl-textfield__input" type="text" id="title">
            <label class="mdl-textfield__label" for="title">Description</label>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
            @endif
        </div>
        <br>
        <!-- Accent-colored raised button with ripple -->
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Create
        </button>
    </form>
@endsection
