<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'get-dev.ru')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <link href="/bundles/css/app.css" rel="stylesheet">
</head>
<body>

<header class="header shadow-1">
    <a href="/" class="logo">get-dev.ru</a>
    <nav class="header__nav">
        @guest
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @else
            <a href="/logout">Logout</a>
        @endguest
    </nav>
</header>

@if(session()->has('message'))
    <div class="container mt-10" onclick="window.location.reload()">
        <div class="alert">
            {{ session()->get('message') }}
        </div>
    </div>
@endif

@yield('content')

<script src="/bundles/js/app.js"></script>
</body>
</html>
