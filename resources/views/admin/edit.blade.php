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
                        <h1>Editing <b>{{ $username }}</b> profile</h1>
                    </div>

                    <div class="panel-body">
                        <form id="editUser" action="{{ url('/api/users', ['id' => $id]) }}" method="post">
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="{{ $username }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email address</label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ $email }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ $name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputSecondName">Second Name</label>
                                <input type="text" class="form-control" id="inputSecondName" placeholder="Second Name" name="second_name" value="{{ $second_name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Phone</label>
                                <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phone" value="{{ $phone }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEnabled">Enabled</label>
                                <input type="text" class="form-control" id="inputEnabled" placeholder="Enabled" name="enabled" value="{{ $enabled }}">
                            </div>
                            <div class="form-group">
                                <label for="inputIsAdmin">Is Admin</label>
                                <input type="text" class="form-control" id="inputIsAdmin" placeholder="Is Admin" name="isAdmin" value="{{ $isAdmin }}">
                            </div>
                            <button id="editSubmitButton" type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('admin') }}"><button type="button" class="btn btn-primary">Back</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
