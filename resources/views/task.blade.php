@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <div class="task">
            <a href="{{ route('user', $task->owner->id) }}" class="task__owner">
                <img src="{{ $task->owner->img }}" class="task__owner-photo" alt="">
                <h4 class="task__owner-name">
                    {{ $task->owner->name }}
                </h4>
            </a>
            <h1>{{ $task->title }}</h1>
            <p>{{ $task->description }}</p>
        </div>

        <h2>Accepted requests:</h2>
        <ul>
            @foreach($task->getAcceptedDevRequests() as $acceptedRequest)
                <li class="text">
                    <a href="{{ route('user', $acceptedRequest->user->id) }}">
                        {{ $acceptedRequest->user->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <h2>Active requests:</h2>
        <ul>
            @foreach($task->getUnAcceptedDevRequests() as $unacceptedRequest)
                <li class="text">
                    <a href="{{ route('user', $unacceptedRequest->user->id) }}">
                        {{ $unacceptedRequest->user->name }}
                    </a>
                    @if (Auth::user()->checkIfOwnTask($task->id))
                        <a href="{{ route('accept-request', $unacceptedRequest->id) }}" class="btn">Accept request</a>
                    @endif
                </li>
            @endforeach
        </ul>

        @if (Auth::user()->checkIfOwnTask($task->id))
            <div class="text">
                <a href="/delete-task/{{ $task->id }}" class="btn btn--danger">Delete</a>
            </div>
        @else
            <div class="text">
                <a href="#" class="btn">Be a partner</a>
            </div>
            <div class="text">
                <a href="{{ route('create-dev-request', $task->id) }}" class="btn">Create dev request</a>
            </div>
        @endif
    </div>

@endsection