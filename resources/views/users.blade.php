@extends('layouts.app')

@section('title', 'Search for people')

@section('content')
    <div class="container block mt-10 text">

        <form action="{{ route('users') }}">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search" class="search">
        </form>
    </div>
    <div class="container">
        <ul class="users">
            @foreach($users as $user)
                <a href="/users/{{ $user->id }}"><li>{{ $user->name }} {{ $user->email }}</li></a>
            @endforeach
        </ul>
    </div>
@endsection
