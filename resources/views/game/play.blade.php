@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Play</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="col-sm-3">
            <h2>Play options:</h2>
            <form method="post" action="{{ url('/api/games', ['id' => Auth::User()->id]) }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::User()->id }}">
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input id="default-gap" type="radio" name="gap" value="pos-4-4" required checked>
                            Default Gap
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input id="random-gap" type="radio" name="gap" value="random" required>
                            Random Gap
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="timer-option" class="col-sm-12 control-label">Set Seconds</label>
                    <div class="col-sm-10">
                        <label>
                            <input id="timer-option" type="number" name="timer-option" value="" placeholder="Time">
                            0 or blank for Timeless
                        </label>
                    </div>
                </div>
                <div id="saveGameBtn" class="form-group">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-success" onclick="createBoard()">Play</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="play-container" class="col-sm-9">
            <div class="flex-row-c-s">
                <div id="play-timer" class="flex-row-c-c">
                    <h1>Timer: <span id="display-time"></span></h1>
                </div>
                <div id="play-score" class="flex-row-c-c">
                    <h1>Score: <span id="display-score"></span></h1>
                </div>
            </div>
            <div id="board" class="flex-col-c-c"></div>
        </div>
        <!-- /#play-container -->

    </div><!-- /.container -->

@endsection
