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
            <h1>Place</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <section id="place-options" class="window flex-col-c-s">
                <section id="place-start" class="flex-row-c-c" onclick="choosePlaceOptions();">
                    <button class="btn btn-success">Start!</button>
                </section>
                <div id="empty-board" class="flex-col-c-c"></div>
            </section>
            <!-- /#place-options -->

        </div>
    </div>

    <div class="container">
        <div class="row">

            <section id="place-other-options" class="window flex-col-sa-c">
                <section class="container flex-col-c-c">
                    <h1>Choose options:</h1>
                    <section class="flex-col-sa-s">
                        <section class="margin-t-b">
                            <label for="place-timer-option">Time (in seconds):</label>
                            <input id="place-timer-option" type="number" name="place-timer-option" placeholder="0 or blank timeless" required>
                        </section>
                        <section class="flex-row-sa-c">
                            <a href="index.html">
                                <button class="btn btn-primary">Back</button>
                            </a>
                            <button class="btn btn-success" onclick="startGame()">Play!</button>
                        </section>
                    </section>
                </section>
            </section>
            <!-- /#place-other-options -->

        </div>
    </div>

    <div class="container">
        <div class="row">

            <section id="place-container" class="window flex-col-c-s">
                <section class="flex-row-c-s">
                    <section id="play-back" class="flex-row-c-c">
                        <a href="index.html">
                            <svg width="20%" height="20%" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="460.298px" height="460.297px" viewBox="0 0 460.298 460.297" style="enable-background:new 0 0 460.298 460.297;"
                                 xml:space="preserve">
                    <path d="M230.149,120.939L65.986,256.274c0,0.191-0.048,0.472-0.144,0.855c-0.094,0.38-0.144,0.656-0.144,0.852v137.041
                    c0,4.948,1.809,9.236,5.426,12.847c3.616,3.613,7.898,5.431,12.847,5.431h109.63V303.664h73.097v109.64h109.629
                    c4.948,0,9.236-1.814,12.847-5.435c3.617-3.607,5.432-7.898,5.432-12.847V257.981c0-0.76-0.104-1.334-0.288-1.707L230.149,120.939
                    z"/>
                                <path d="M457.122,225.438L394.6,173.476V56.989c0-2.663-0.856-4.853-2.574-6.567c-1.704-1.712-3.894-2.568-6.563-2.568h-54.816
                    c-2.666,0-4.855,0.856-6.57,2.568c-1.711,1.714-2.566,3.905-2.566,6.567v55.673l-69.662-58.245
                    c-6.084-4.949-13.318-7.423-21.694-7.423c-8.375,0-15.608,2.474-21.698,7.423L3.172,225.438c-1.903,1.52-2.946,3.566-3.14,6.136
                    c-0.193,2.568,0.472,4.811,1.997,6.713l17.701,21.128c1.525,1.712,3.521,2.759,5.996,3.142c2.285,0.192,4.57-0.476,6.855-1.998
                    L230.149,95.817l197.57,164.741c1.526,1.328,3.521,1.991,5.996,1.991h0.858c2.471-0.376,4.463-1.43,5.996-3.138l17.703-21.125
                    c1.522-1.906,2.189-4.145,1.991-6.716C460.068,229.007,459.021,226.961,457.122,225.438z"/>
                    </svg>
                        </a>
                    </section>
                    <section id="play-timer" class="flex-row-c-c">
                        <h1>Timer: <span id="display-time-place"></span></h1>
                    </section>
                    <section id="play-score" class="flex-row-c-c">
                        <h1>Score: <span id="display-score-place"></span></h1>
                    </section>
                </section>
                <div id="place-board" class="flex-col-c-c"></div>
            </section>
            <!-- /#place-container -->

        </div>
    </div>

@endsection
