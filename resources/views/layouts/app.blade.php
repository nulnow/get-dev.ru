<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'kek')</title>

    <link href="/bundles/css/app.css" rel="stylesheet">
</head>
<body>

<header class="header shadow-1">
    <a href="/" class="logo">Krad</a>
    <nav class="header__nav">
        @guest
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @else
            <a href="/logout">Logout</a>
        @endguest
    </nav>
</header>

@yield('content')

<script src="/bundles/js/app.js"></script>
</body>
</html>
