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

@endsection
