<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'get-dev.ru')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/material.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <link href="/bundles/css/app.css" rel="stylesheet">
    <style>
        .login-form,
        .container {
            max-width: 320px;
            min-height: 99vh
        }
        .login-form {
            display: block;
            width: 100%;

            margin: 0 auto;
            margin-top: 10vh;
            margin-bottom: 10vh;

            background-color: #fff;
        }
        .search-form {
            max-width: 320px;
            background-color: #fff;
            width: 100%;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 5px;
        }
        .demo-card-wide.mdl-card {
            width: 100%;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            min-height: 106px;
            /*background: url('../assets/demos/welcome_card.jpg') center / cover;*/
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>
</head>
<body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">
                <a href="/" style="color: white; text-decoration: none;">
                    get-dev.ru
                </a>
                @auth
                    @if (Auth::user()->getAcceptedDevRequests())
                        <small><a style="color: white;" href="/my-requests">
                            <span class="mdl-badge" data-badge="{{ count(Auth::user()->getAcceptedDevRequests()) }}">accepted tasks</span>
                        </a></small>
                    @endif
                @endauth
            </span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                @guest
                    {{--<a class="mdl-navigation__link" href="/login">Login</a>--}}
                    {{--<a class="mdl-navigation__link" href="/register">Register</a>--}}
                @else
                    <a class="mdl-navigation__link" href="{{ route('user', Auth::user()->id) }}">
                        {{ Auth::user()->name }}
                    </a>
                    <a class="mdl-navigation__link" href="/logout">Logout</a>
                @endguest
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        @auth
            <span class="mdl-layout-title"><a href="/">help</a></span>
        @endauth
        <nav class="mdl-navigation">
            @guest
                <a class="mdl-navigation__link" href="/login">Login</a>
                <a class="mdl-navigation__link" href="/register">Register</a>
            @else
                <a class="mdl-navigation__link" href="{{ route('user', Auth::user()->id) }}">
                    {{ Auth::user()->name }}
                </a>
                <a class="mdl-navigation__link" href="/profile">Profile</a>
                <a class="mdl-navigation__link" href="/tasks">Tasks</a>
                <a class="mdl-navigation__link" href="/users">Users</a>
                <a class="mdl-navigation__link" href="/my-requests">My Requests
                        @if (Auth::user()->getAcceptedDevRequests())
                            <span class="mdl-badge" data-badge="{{ count(Auth::user()->getAcceptedDevRequests()) }}"></span>
                        @endif
                    </a>
                <a class="mdl-navigation__link" href="/my-tasks">My Tasks
                    @if (Auth::user()->getIncomingDevRequestsCount())
                        <span class="mdl-badge" data-badge="{{ count(Auth::user()->getIncomingDevRequestsCount()) }}"></span>
                    @endif
                </a>
                <a class="mdl-navigation__link" class="mdl-navigation__link" href="/logout">Logout</a>
            @endguest
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content" style="min-height: 70vh">
            @if(session()->has('message'))
                {{--<button id="demo-show-snackbar" class="mdl-button mdl-js-button mdl-button--raised" type="button">Show Snackbar</button>--}}
                <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
                    <div class="mdl-snackbar__text"></div>
                    <button class="mdl-snackbar__action" type="button"></button>
                </div>
            @endif
            @auth
            <!-- Colored FAB button with ripple -->
                <a style="position: fixed; bottom: 50px; right: 50px"
                   href="/create-task"
                   class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
                   title="Create new task">
                    <i class="material-icons">add</i>
                </a>
            @endauth
            @yield('content')
        </div>
        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer__left-section">
                <ul class="mdl-mini-footer__link-list">
                    <li><a href="https://github.com/nulnow/get-dev.ru">github</a></li>
                </ul>
            </div>
        </footer>
    </main>
</div>

<script src="/bundles/js/app.js"></script>
@if(session()->has('message'))
    <script>
        (function() {
            'use strict';
            var snackbarContainer = document.querySelector('#demo-snackbar-example');
            var showSnackbarButton = document.querySelector('#demo-show-snackbar');
            var handler = function(event) {

            };
            setTimeout(function() {
                'use strict';
                var data = {
                    message: '{{ session()->get('message') }}',
                    timeout: 3000,
                    actionHandler: handler,
                    actionText: 'Ok'
                };
                snackbarContainer.MaterialSnackbar.showSnackbar(data);
            }, 500);
        }());
    </script>
@endif
</body>
</html>
