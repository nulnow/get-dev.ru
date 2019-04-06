@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="/search">
            <input type="text" name="q">
        </form>

        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} {{ $user->email }}</li>
            @endforeach
        </ul>
    </div>
@endsection
