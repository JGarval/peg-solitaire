@extends('layouts.app')

@section('dropdown-menu')
    @if(Auth::User()->isAdmin == 1)
        <li>
            <a href="{{ route('admin') }}">
                Admin
            </a>
        </li>
    @else
        <li>
            <a href="{{ route('score') }}">
                My Scores
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    Hello {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
