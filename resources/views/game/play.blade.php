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
        <div class="row">
            <div id="alert_success" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
                <strong>Success!</strong> Everything went as expected.
            </div>
        </div>
        <div class="row">
            <div id="alert_danger" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
                <strong>Warning!</strong> Better check yourself, you're not looking too good.
            </div>
        </div>
    </div>

    <div id="mainMsg" class="container" style="display: none;">
        <div class="jumbotron">
            <div class="row">
                <h2>Game finished!</h2>
            </div>
            <div class="row">
                <div class="col-md-3">Username</div>
                <div class="col-md-3">Score</div>
                <div class="col-md-3">Time</div>
            </div>
            <div class="row">
                <div class="col-md-3">{{ Auth::User()->username }}</div>
                <div id="mainScore" class="col-md-3"></div>
                <div id="mainTime" class="col-md-3"></div>
                <div class="col-md-1"><button class="btn btn-primary" onclick="saveGame()">Upload score</button></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-sm-3">
            <h2>Play options:</h2>
            <form>
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


    <script src="{{ asset('js/play.js') }}"></script>
@endsection
