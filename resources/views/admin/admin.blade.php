@extends('layouts.app')

<!-- TODO: Hay que poner que vaya a profile -->
@section('dropdown-menu')
    <li>
        <a href="{{ route('home') }}">
            Home
        </a>
    </li>
@endsection

@section('content')

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


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Users to enable</h2>
                <div id="users_to_enable" class="container">
                    <div class="row">
                        <div class="col-xs-3">Username</div>
                        <div class="col-xs-3">Email</div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h2>Users List</h2>
                <div id="users_list" class="container">
                    <div class="row">
                        <div class="col-xs-3">Username</div>
                        <div class="col-xs-3">Email</div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Scores</h2>
                <div id="users_scores" class="container">
                    <div class="row">
                        <div class="col-xs-3">Username</div>
                        <div class="col-xs-3">Score</div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div><!-- /container -->

@endsection