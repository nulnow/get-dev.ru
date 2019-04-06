@extends('layouts.app')

@section('title', 'My requests')

<?php $user = Auth::user(); ?>

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <h2>My requests:</h2>
        <ul>

        </ul>
    </div>

@endsection
