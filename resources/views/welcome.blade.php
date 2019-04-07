@extends('layouts.app')

@section('content')

    @guest
        <div style="
            background-image: url('https://media.giphy.com/media/G06qqg0VZnvLG/giphy.gif');
            -webkit-background-size: cover;
            background-size: cover;
            height: 550px;
        ">
            <div class="container" style="color: white;">
                <h1
                    style="
                        margin-top: 20vh;
                        background-color: #212121;
                        font-size: 40px;
                        padding: 10px;
                    "
                >Краудфандинг нового уровня</h1>
                <p
                    style="
                        background-color: rgba(0,0,0,0.8);
                    "
                >Нескучные обои, чат, копатыч гарантирует</p>
            </div>
        </div>
        <div class="container">
            {{--<div class="advantage">--}}
                {{--<img src="https://images.vexels.com/media/users/3/132826/isolated/preview/5b6683288fdfe1a87f3a7dbbd302fba9-zoom-tool-by-vexels.png" alt="">--}}
                {{--<p>Поиск разработчиков Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos harum iure libero minus necessitatibus nobis nostrum, numquam obcaecati ut.</p>--}}
            {{--</div>--}}
            {{--<div class="advantage">--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at beatae deserunt nam pariatur sunt? Exercitationem nobis odit quo velit?</p>--}}
                {{--<img src="https://image.flaticon.com/icons/png/512/37/37631.png" alt="">--}}
            {{--</div>--}}
        </div>
    @else

    @endguest

@endsection
