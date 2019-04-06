@extends('layouts.app')

@section('title', 'My requests')

<?php $user = Auth::user(); ?>

@section('content')

    <div class="mt-10 container block shadow-1 text">
        <h4>My requests:</h4>
        @foreach(Auth::user()->getUnAcceptedDevRequests() as $unacceptedRequest)
            <?php $task =  $unacceptedRequest->task ?>
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title"
                     style="background: url('{{ $task->img ? $task->img : 'https://media.giphy.com/media/OBBYTaRSqzYBi/giphy.gif' }}') center / cover;"
                >
                    <h2 class="mdl-card__title-text" style=" background-color: #212121; padding-right: 15px; border-radius: 20px">
                        @if ($task->owner->img)
                            <img style="min-width: 30px" class="mdl-chip__contact" src="{{ $task->owner->img }}">
                        @else
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"></span>
                        @endif
                        {{ $task->title }}
                    </h2>
                </div>
                <div class="mdl-card__supporting-text">
                    {{ $task->description }}
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="/tasks/{{ $task->id }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        open
                    </a>
                </div>

            </div>
            <br>
        @endforeach
    </div>

@endsection
