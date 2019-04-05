@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <div class="task">
            <div class="task__owner">
                <img class="task__owner-photo" alt="">
                <h4 class="task__owner-name">{{ $task->owner->name }}</h4>
            </div>
            <h1>{{ $task->title }}</h1>
            <p>{{ $task->description }}</p>
        </div>
        @if ($task->creator === Auth::user()->id)
            <div class="text">
                <a href="/delete-task/{{ $task->id }}" class="btn btn--danger">Delete</a>
            </div>
        @else
            <div class="text">
                <a href="/delete-task/{{ $task->id }}" class="btn btn--danger">I want to be a partner</a>
                <a href="/delete-task/{{ $task->id }}" class="btn btn--danger">I want to be a developer</a>
            </div>
        @endif
    </div>

@endsection
