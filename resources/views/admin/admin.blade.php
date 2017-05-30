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
            <div class="col-xs-12">
                <h2>Peticiones de usuarios</h2>
                <div id="peticiones" class="container">
                    <div class="row">
                        <div class="col-xs-2">Usernase</div>
                        <div class="col-xs-2">Email</div>
                    </div>
                    <hr>

                </div>
            </div>
            <div class="col-xs-12">
                <h2>Tabla de usuarios</h2>
            </div>
            <div class="col-md-12">
                <h2>Puntuaciones</h2>
            </div>
        </div>
    </div>

@endsection