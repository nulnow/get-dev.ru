@extends('layouts.app')

@section('title', 'Create task')

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <form action="/tasks" method="POST">
            <h1>Create new task</h1>

            <label class="label" for="">
                <span>Task name</span>
                <input name="title" type="text">
            </label>

            <label class="label" for="">
                <span>Task description</span>
                <textarea name="description"></textarea>
            </label>

            <div>
                <button type="submit" class="btn">Create</button>
            </div>
        </form>
    </div>

@endsection
