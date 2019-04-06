@extends('layouts.app')

@section('content')

    <div class="mt-10 container text block">
        <form action="/profile" method="POST">

            <h1>Your profile</h1>

            <label class="label" for="">
                <span>Your name</span>
                <input name="name" type="text" value="{{ $user->name }}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </label>

            <label class="label" for="">
                <span>Your email</span>
                <input name="email" type="email" value="{{ $user->email }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </label>

            <label class="label" for="">
                <span>Description</span>
                <textarea name="bio" style="height: 100px;">{{ $user->bio }}</textarea>
                @if ($errors->has('bio'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('bio') }}</strong>
                    </span>
                @endif
            </label>

            <label class="label" for="">
                <span>Skills</span>
                <textarea name="skills" style="height: 100px;">{{ implode(', ', $user->getSkillsAsArray()) }}</textarea>
                @if ($errors->has('skills'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('skills') }}</strong>
                    </span>
                @endif
            </label>

            <div class="text">
                <button class="btn" type="submit">Save</button>
            </div>
        </form>

    </div>

@endsection
