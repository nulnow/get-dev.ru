@extends('layouts.app')

@section('title', 'Chat with ' . $notYou->name)

@section('content')

    <div class="mt-10 container ">
        <script>
            window.you = <?php
                echo \json_encode($you);
            ?>;
             window.notYou = <?php
                echo \json_encode($notYou);
            ?>;
        </script>
        <div id="chat"></div>
    </div>

@endsection
