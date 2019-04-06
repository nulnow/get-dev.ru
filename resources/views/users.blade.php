@extends('layouts.app')

@section('title', 'Search for people')

@section('content')
    <div class="container">
        <h3>Users
            <!-- Expandable Textfield -->
            <form action="{{ route('users') }}" class="search-form">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                        <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input name="q" class="mdl-textfield__input" type="text" id="sample6">
                        <label class="mdl-textfield__label" for="sample-expandable">Search</label>
                    </div>
                </div>
            </form>
        </h3>
        <!-- Image card -->
        <style>
            .demo-card-image.mdl-card {
                width: 256px;
                height: 256px;
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
        @foreach($users as $user)

            <a
                href="/users/{{ $user->id }}"
                class="demo-card-image mdl-card mdl-shadow--2dp"
                style="
                    @if($user->img)
                        background: url('{{ $user->img }}') center / cover;
                    @else
                        background: #00695C;
                    @endif
                ">
                <div class="mdl-card__title mdl-card--expand"></div>
                <div class="mdl-card__actions">
                    <span class="demo-card-image__filename">{{ $user->name }}</span>
                </div>
            </a>
            <br>
        @endforeach
    </div>
@endsection
