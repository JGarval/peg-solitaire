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
                    <form id="editProfile" action="{{ url('/api/users', ['id' => Auth::user()->id]) }}" method="post">
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="{{ Auth::user()->username }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone">Phone</label>
                            <input type="number" class="form-control" id="inputPhone" placeholder="Phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="inputSecondName">Second Name</label>
                            <input type="text" class="form-control" id="inputSecondName" placeholder="Second Name" name="second_name" value="{{ Auth::user()->second_name }}">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('admin') }}"><button type="button" class="btn btn-primary">Back</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
