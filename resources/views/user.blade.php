@extends('layouts.app')

@section('title', $user->name)

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <h2>Profile:</h2>
        <div class="user">
            <img src="{{ $user->img }}" alt="">
            <div class="text">
                <a href="{{ route('chat', $user->id) }}" class="btn">Open chat</a>
            </div>
            <div class="user__field">
                <h1>{{ $user->name }}</h1>
            </div>
            <div class="user__field">
                <p>{{ $user->email }}</p>
            </div>
            <div class="user__field">
                <p><small>Bio:</small></p>
                <p>{{ $user->bio }}</p>
            </div>
            <div class="user__field">
                <p><small>Skills:</small></p>
                <p>{{ $user->renderSkills() }}</p>
            </div>
        </div>
    </div>

@endsection
