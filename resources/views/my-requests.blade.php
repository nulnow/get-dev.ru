@extends('layouts.app')

@section('title', 'My requests')

<?php $user = Auth::user(); ?>

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <h2>My requests:</h2>
        <ul class="tasks">
            @foreach(Auth::user()->getUnAcceptedDevRequests() as $unacceptedRequest)
                <li class="task">
                    <a href="{{ route('user', $unacceptedRequest->user->id) }}">
                        <img class="request__user-img" src="{{ $unacceptedRequest->user->img }}" alt="">
                        {{ $unacceptedRequest->user->name }}
                    </a>
                    <a href="{{ route('delete-dev-request', $unacceptedRequest->id) }}" class="btn btn--danger">Delete request</a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
