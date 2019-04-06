@extends('layouts.app')

@section('title', $task->title)

@section('content')


    <div class="mt-10 shadow-1 container">
        <div class="task">
            <h3>
                {{ $task->title }}
            </h3>

            <!-- Deletable Contact Chip -->
            <a
                href="{{ route('user', $task->owner->id) }}"
                class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                @if ($task->owner->img)
                    <img class="mdl-chip__contact" src="{{ $task->owner->img }}"></img>
                @else
                    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"></span>
                @endif
                <span class="mdl-chip__text" style="padding-right: 15px">{{ $task->owner->name }}</span>
            </a>

            @if($task->img)
                <img src="{{ $task->img }}" style="width: 100%; height: 200px" alt="">
            @endif
            <br><br><br>
            <p>{{ $task->description }}</p>
            <br>
        </div>

        @if (Auth::user()->checkIfOwnTask($task->id))
            <div class="">
                <a href="/delete-task/{{ $task->id }}" class="mdl-button mdl-js-button mdl-button--raised">Delete</a>
            </div>
        @else
            <div class="">
                <a href="{{ route('create-dev-request', $task->id) }}" style="margin-bottom: 5px"
                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Create dev request
                </a>
            </div>
        @endif
        <br><br>

            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#starks-panel" class="mdl-tabs__tab is-active">Accepted requests</a>
                    <a href="#lannisters-panel" class="mdl-tabs__tab">Requests</a>
                </div>

                <div class="mdl-tabs__panel is-active" id="starks-panel">
                    <div class="demo-list-action mdl-list">

                        @foreach($task->getAcceptedDevRequests() as $acceptedRequest)
                            <div class="mdl-list__item">

                            <span class="mdl-list__item-primary-content">
                              <i class="material-icons mdl-list__item-avatar">person</i>
                                <a href="{{ route('user', $acceptedRequest->user->id) }}">
                              <span>{{ $acceptedRequest->user->name }}</span>
                                    </a>
                            </span>

                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="mdl-tabs__panel" id="lannisters-panel">
                    <style>
                        .demo-list-two {
                            width: 300px;
                        }
                    </style>
                    <div class="demo-list-two mdl-list">
                        @foreach($task->getUnAcceptedDevRequests() as $unacceptedRequest)
                            <div class="mdl-list__item">

                        <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">person</i>
                            <a href="{{ route('user', $unacceptedRequest->user->id) }}">
                          <span>{{ $unacceptedRequest->user->name }}</span>
                        </a>
                            @if (Auth::user()->checkIfOwnTask($task->id))
                                <a class="mdl-list__item-secondary-action"
                                   href="{{ route('accept-request', $unacceptedRequest->id) }}"
                                ><i class="material-icons">star</i></a>
                            @endif
                        </span>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
    </div>


@endsection
