@extends('layouts.app')

@section('content')

    <div class="mt-10 container block shadow-1">
        <div class="text">
            <a href="/create-task" class="btn">Create task</a>
        </div>

        <form action="{{ route('tasks') }}">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search" class="search">
        </form>

        <div class="tasks">
            @foreach($tasks as $task)
                <a href="/tasks/{{ $task->id }}" class="task">

                    <img src="{{ $task->owner->img }}" class="task__owner-photo">

                    <div class="task__texts">
                        <h1 class="task__title">{{ $task->title }}</h1>
                        <p class="task__description">{{ $task->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
