@extends('layouts.app')

@section('title', $user->name)

@section('content')

    <div class="container">
        <!-- Image card -->
        <style>
            .demo-card-image.mdl-card {
                width: 256px;
                height: 256px;
                @if($user->img)
                    background: url('{{ $user->img }}') center / cover;
                @else
                    background: #00695C;
                @endif
            }
            .demo-card-image > .mdl-card__actions {
                height: 52px;
                padding: 16px;
                background: rgba(0, 0, 0, 0.2);
            }
            .demo-card-image__filename {
                color: #fff;
                font-size: 14px;
                font-weight: 500;
            }
        </style>

        <div class="demo-card-image mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">{{ $user->email }}</span>
            </div>
        </div>
        <h1>
            {{ $user->name }}
            <a href="{{ route('chat', $user->id) }}" title="Open chat">
                <i style="font-size: 48px;" class="material-icons">send</i>
            </a>
        </h1>

        <div class="user__field">
            <p><small>Bio:</small></p>
            <p>{{ $user->bio }}</p>
        </div>
        <div class="user__field">
            <p><small>Skills:</small></p>
            <p>{{ $user->renderSkills() }}</p>
        </div>
    </div>

@endsection
