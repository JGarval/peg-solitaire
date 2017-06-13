@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Score</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h1>Score</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li><a href="#" onclick="printScores(5)">5</a></li>
                    <li><a href="#" onclick="printScores(10)">10</a></li>
                    <li><a href="#" onclick="printScores(100)">All</a></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div id="users_score" class="container">
                <div class="row">
                    <div class="col-xs-3">User ID</div>
                    <div class="col-xs-3">Score</div>
                    <div class="col-xs-3">Time</div>
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
