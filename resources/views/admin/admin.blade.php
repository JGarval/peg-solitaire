@extends('layouts.app')

<!-- TODO: Hay que poner que vaya a profile -->
@section('dropdown-menu')
    <li>
        <a href="{{ route('home') }}">
            Profile
        </a>
    </li>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div id="alert_success" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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