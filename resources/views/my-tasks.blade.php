@extends('layouts.app')

@section('title', 'My tasks')

<?php $user = Auth::user(); ?>

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <h2>My tasks:</h2>
        <ul>
            @foreach($user->tasks as $task)
                <a href="{{ route('task', $task->id) }}"><li>{{ $task->title }}</li></a>
            @endforeach
        </ul>
    </div>

@endsection
