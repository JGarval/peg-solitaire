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
        <div class="col-sm-3">
            <h2>Place options:</h2>
            <form class="form">
                <div class="form-group">
                    <label for="place-timer-option" class="col-sm-12 control-label">Set Seconds</label>
                    <div class="col-sm-10">
                        <label>
                            <input type="number" class="form-control" id="place-timer-option" placeholder="Minutes">
                            0 or blank for Timeless
                        </label>
                    </div>
                </div>
                <div class="form-group">
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

@endsection
