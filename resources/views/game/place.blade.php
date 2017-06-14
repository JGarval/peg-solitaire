@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Place</li>
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


    <div id="mainBoard" class="container">
        <div class="col-sm-3">
            <h2>Place options:</h2>
            <form class="form">
                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::User()->id }}">
                <div class="form-group">
                    <label for="place-timer-option" class="col-sm-12 control-label">Set Seconds</label>
                    <div class="col-sm-10">
                        <label>
                            <input type="number" class="form-control" id="place-timer-option" placeholder="Minutes">
                            0 or blank for Timeless
                        </label>
                    </div>
                </div>
                <div id="saveGameBtn" class="form-group">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-success" onclick="startGame()">Play</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="place-options" class="col-sm-9">
            <section class="flex-row-c-s">
                <section id="play-timer" class="flex-row-c-c">
                    <h1>Timer: <span id="display-time-place"></span></h1>
                </section>
                <section id="play-score" class="flex-row-c-c">
                    <h1>Score: <span id="display-score-place"></span></h1>
                </section>
            </section>
            <div id="empty-board" class="flex-col-c-c"></div>
        </div>

        {{--<div id="place-container" class="col-sm-9">--}}
            {{--<section class="flex-row-c-s">--}}
                {{--<section id="place-timer-option" class="flex-row-c-c">--}}
                    {{--<h1>Timer: <span id="display-time-place"></span></h1>--}}
                {{--</section>--}}
                {{--<section id="place-score-option" class="flex-row-c-c">--}}
                    {{--<h1>Score: <span id="display-score-place"></span></h1>--}}
                {{--</section>--}}
            {{--</section>--}}
            {{--<div id="place-board" class="flex-col-c-c"></div>--}}
        {{--</div>--}}

    </div><!-- /.container -->

    {{--<div class="container">--}}
        {{--<div class="row">--}}

            {{--<section id="place-container" class="window flex-col-c-s">--}}
                {{--<section class="flex-row-c-s">--}}
                    {{--<section id="play-timer" class="flex-row-c-c">--}}
                        {{--<h1>Timer: <span id="display-time-place"></span></h1>--}}
                    {{--</section>--}}
                    {{--<section id="play-score" class="flex-row-c-c">--}}
                        {{--<h1>Score: <span id="display-score-place"></span></h1>--}}
                    {{--</section>--}}
                {{--</section>--}}
                {{--<div id="place-board" class="flex-col-c-c"></div>--}}
            {{--</section>--}}
            {{--<!-- /#place-container -->--}}

        {{--</div>--}}
    {{--</div>--}}

    <script src="{{ asset('js/play.js') }}"></script>
    <script src="{{ asset('js/place.js') }}"></script>
@endsection
