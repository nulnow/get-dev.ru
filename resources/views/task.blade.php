@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mt-10 shadow-1 container">
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
    </div>
    <div class="container block shadow-1 text">
        <br>
        <h4>Accepted requests:</h4>
        <ul>
            @foreach($task->getAcceptedDevRequests() as $acceptedRequest)
                <li class="">
                    <a href="{{ route('user', $acceptedRequest->user->id) }}">
                        <img width="50" height="50" class="request__user-img" src="{{ $acceptedRequest->user->img }}" alt="">
                        {{ $acceptedRequest->user->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        <br>
        <h4>Active requests:</h4>
        <ul class="demo-list-icon mdl-list">
            @foreach($task->getUnAcceptedDevRequests() as $unacceptedRequest)
                <li class="mdl-list__item">
                    <a href="{{ route('user', $unacceptedRequest->user->id) }}" class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">person</i>
                        {{--<img width="50" height="50" class="request__user-img" src="{{ $unacceptedRequest->user->img }}" alt="">--}}
                        {{ $unacceptedRequest->user->name }}
                    </a>
                    @if (Auth::user()->checkIfOwnTask($task->id))
                        <a href="{{ route('accept-request', $unacceptedRequest->id) }}" class="mdl-button mdl-js-button mdl-js-ripple-effect">Accept request</a>
                    @endif
                </li>
            @endforeach
        </ul>

        @if (Auth::user()->checkIfOwnTask($task->id))
            <div class="">
                <a href="/delete-task/{{ $task->id }}" class="btn btn--danger">Delete</a>
            </div>
        @else
            <div class="">
                <a href="#" style="margin-bottom: 5px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Be a partner
                </a>
                <a href="{{ route('create-dev-request', $task->id) }}" style="margin-bottom: 5px" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Create dev request
                </a>
            </div>
            <div class="">

            </div>
        @endif
    </div>

@endsection
