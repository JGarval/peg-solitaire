@extends('layouts.app')

@section('dropdown-menu')

    <li>
        <a href="{{ route('profile') }}">
            Profile
        </a>
    </li>

@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-md-center text-center">
            <a href="{{ url('/play') }}">
                <div class="col-md-3 round-btn">Play</div>
            </a>
            <a href="{{ url('/place') }}">
                <div class="col-md-3 round-btn">Place</div>
            </a>
            <a href="{{ url('/score') }}">
                <div class="col-md-3 round-btn">Score</div>
            </a>
            <a href="{{ url('/about') }}">
                <div class="col-md-3 round-btn">About</div>
            </a>
        </div>
    </div>

@endsection
