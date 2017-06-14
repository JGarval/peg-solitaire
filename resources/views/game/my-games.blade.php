@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h2><strong>{{ Auth::user()->username }}</strong> games</h2>
        </div>

        <div class="row">
            <div class="col-xs-3">Username</div>
            <div class="col-xs-3">Score</div>
            <div class="col-xs-3">Time</div>
        </div>

        <hr>

        @foreach(\App\Game::where(['user_id' => Auth::user()->id])->get() as $game)
            <div class="row">
                <div class="col-xs-3">{{ $game->user_id }}</div>
                <div class="col-xs-3">{{ $game->score }}</div>
                <div class="col-xs-3">{{ $game->time }}</div>
                <div class="col-xs-1"><button type="button" class="btn btn-danger" onclick="deleteGame({{ $game->id }})">Delete</button></div>
                <div class="col-xs-1"><button type="button" class="btn btn-success" onclick="resumeGame({{ $game->id }})">Resume</button></div>
            </div>

            <hr>
        @endforeach
    </div>

@endsection
