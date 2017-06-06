@extends('layouts.app')

@section('dropdown-menu')
    @if(Auth::User()->isAdmin == 1)
        <li>
            <a href="{{ route('admin') }}">
                Admin
            </a>
        </li>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Hello {{ Auth::user()->name }}!</h1>
                    </div>

                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control" id="inputUsername" placeholder="Username" value="{{ $username }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email address</label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $email }}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ $name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputSecondName">Second Name</label>
                                <input type="text" class="form-control" id="inputSecondName" placeholder="Second Name" value="{{ $second_name }}">
                            </div>
                            <button type="submit" class="btn btn-success">Save!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
