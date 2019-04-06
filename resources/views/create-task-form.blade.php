@extends('layouts.app')

@section('title', 'Create task')

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <form action="/tasks" method="POST">
            <h1>Create new task</h1>

            <label class="label" for="">
                <span>Task name</span>
                <input name="title" type="text" value="{{ old('title') }}">
            </label>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif

            <label class="label" for="">
                <span>Task description</span>
                <textarea name="description">{{ old('description') }}</textarea>
            </label>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif

            <div>
                <button type="submit" class="btn">Create</button>
            </div>
        </form>
    </div>

@endsection
