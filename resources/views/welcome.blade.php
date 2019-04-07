@extends('layouts.app')

@section('content')

    @guest
        <div style="
            background-image: url('https://images.wallpaperscraft.ru/image/kvadrokopter_dron_letatelnyj_apparat_113593_3840x2160.jpg');
            /*background-image: url('https://media.giphy.com/media/26u4jaRV4WfTZdbHy/giphy.gif');*/
            -webkit-background-size: cover;
            background-size: cover;
            height: 580px;
        ">
            <div class="container" style="color: white;">
                <h1
                    style="
                        margin-top: 20vh;
                        background-color: #212121;
                        font-size: 40px;
                        padding: 10px;
                    "
                >Краудфандинг</h1>
                <p
                    style="
                        background-color: rgba(0,0,0,0.8);
                    "
                >Нескучные обои, чат, копатыч гарантирует</p>
                <div>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="/login">Login</a>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="/register">Register</a>
                </div>
            </div>
        </div>
        {{--<div class="container">--}}
            {{--<div class="advantage">--}}
                {{--<img src="https://images.vexels.com/media/users/3/132826/isolated/preview/5b6683288fdfe1a87f3a7dbbd302fba9-zoom-tool-by-vexels.png" alt="">--}}
                {{--<p>Поиск разработчиков Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos harum iure libero minus necessitatibus nobis nostrum, numquam obcaecati ut.</p>--}}
            {{--</div>--}}
            {{--<div class="advantage">--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at beatae deserunt nam pariatur sunt? Exercitationem nobis odit quo velit?</p>--}}
                {{--<img src="https://image.flaticon.com/icons/png/512/37/37631.png" alt="">--}}
            {{--</div>--}}
        {{--</div>--}}
    @else
        <div class="container">
            <h3><mark>get-dev.ru</mark> - система поиска заданий и исполнителей</h3>
            <h4>Как пользоваться:</h4>
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#starks-panel" class="mdl-tabs__tab is-active">Я заказчик</a>
                    <a href="#lannisters-panel" class="mdl-tabs__tab">Я разработчик</a>
                </div>

                <div class="mdl-tabs__panel is-active" id="starks-panel">
                    <div class="demo-list-action mdl-list">
                        <ol>
                            <li>
                                Заполнить информацию о себе - <a href="/profile"><mark>в профиле</mark></a><br>
                                <img src="/screens/profile.png" width="100%" alt="">
                            </li>
                            <li>
                                (Для заказчиков) Создать задание - <a href="/create-task"><mark>Здесь (ТыК)</mark></a><br>
                                <img src="/screens/create.png" width="100%" alt=""><br>
                            </li>
                            <li>
                                Подождать, пока кто-то из разработчиков не захочет его выполнить
                                <br>
                                <img src="/screens/request.png" width="100%" alt=""><br>
                            </li>
                            <li>
                                Выбрать понравившигся разработчиков (нажать на звёздочку справа от запроса)
                            </li>
                            <li>
                                Перейти в профиль разработчика (кликнуть на него)
                            </li>
                            <li>
                                Нажать на иконку чата <br>
                                <img width="100%" src="/screens/chat-icon.png" alt="">
                            </li>
                            <li>
                                Обсудить выпонение задания <br>
                                <img width="100%" src="/screens/chat.png" alt="">
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="mdl-tabs__panel" id="lannisters-panel">
                    <style>
                        .demo-list-two {
                            width: 300px;
                        }
                    </style>
                    <div class="demo-list-two mdl-list">
                        <ol>
                            <li>
                                Заполнить информацию о себе - <a href="/profile"><mark>в профиле</mark></a><br>
                                <img src="/screens/profile.png" width="100%" alt="">
                            </li>
                            <li>
                                Перейти на страницу с заказами - <a href="/tasks"><mark>вот на эту (тык)</mark></a><br>
                                <img src="/screens/tasks.png" width="100%" alt=""><br>
                            </li>
                            <li>
                                Выбрать понравившийся заказ
                                <br>
                                <img src="/screens/taks.png" width="100%" alt=""><br>
                            </li>
                            <li>
                                Нажать на кнопку "create dev request"
                            </li>
                            <li>
                                Запрос на разработку появится на странице <a href="/my-tasks"><mark>мои заказы</mark></a>
                                и когда он будет одобрен, на нём появится значёк <br>
                                <img src="/screens/accepted.png" width="100%" alt=""><br>
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    @endguest

@endsection
