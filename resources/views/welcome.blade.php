@extends('layouts.app')

@section('content')

    @guest
        <div class="mt-10 container-fluid shadow-1 jumbotron jumbotron--welcome" style="background-image: url('http://www.wallpaperback.net/wp-content/uploads/2018/08/Wallpaper%20Samsung%20Galaxy%20Note%209,%20Android%208.0,%20Android%20Oreo,%20abstract,%20colorful,%20Abstract%209280718172.jpg');">
            <div class="container">
                <h1>Краудфандинг</h1>
                <p>Nihil verum est licet omnia.</p>
            </div>
        </div>
        <div class="container block shadow-1">
            <div class="advantage">
                <img src="https://images.vexels.com/media/users/3/132826/isolated/preview/5b6683288fdfe1a87f3a7dbbd302fba9-zoom-tool-by-vexels.png" alt="">
                <p>Поиск разработчиков Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos harum iure libero minus necessitatibus nobis nostrum, numquam obcaecati ut.</p>
            </div>
            <div class="advantage">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at beatae deserunt nam pariatur sunt? Exercitationem nobis odit quo velit?</p>
                <img src="https://image.flaticon.com/icons/png/512/37/37631.png" alt="">
            </div>
        </div>
    @else
        <div class="mt-10 container block shadow-1">
            <nav class="nav-links">
                <a href="/profile">Profile</a>
                <a href="/tasks">Tasks</a>
                <a href="/chat">Chat</a>
                <a href="/users">Users</a>
                <a href="/my-requests">My Requests</a>
                <a href="/my-tasks">My Tasks</a>
            </nav>
        </div>
    @endguest

@endsection
