@extends('layouts.app')

@section('content')

    <div class="mt-10 container text block">
        <form action="/profile" method="POST">
            <h1>Your profile</h1>

            <label class="label" for="">
                <span>Your name</span>
                <input type="text">
            </label>

            <label class="label" for="">
                <span>Your email</span>
                <input type="email">
            </label>

            <label class="label" for="">
                <span>Description</span>
                <textarea style="height: 100px;"></textarea>
            </label>
        </form>

    </div>

@endsection
