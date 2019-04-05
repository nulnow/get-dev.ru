@extends('layouts.app')

@section('content')

    <div class="mt-10 container block shadow-1">
        <div class="text">
            <a href="/create-task" class="btn">Create task</a>
        </div>
        <div class="tasks">
            @foreach($tasks as $task)
                <a href="/tasks/{{ $task->id }}" class="task">
                    <div class="task__owner-photo"></div>
                    <div class="task__texts">
                        <h1 class="task__title">{{ $task->title }}</h1>
                        <p class="task__description">{{ $task->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
