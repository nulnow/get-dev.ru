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
        <div></div>

    </div>

@endsection
