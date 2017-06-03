@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">About</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h1>About</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi architecto beatae, blanditiis corporis dicta, dolor dolore dolores earum eius error laudantium libero nesciunt praesentium recusandae rerum suscipit temporibus, tenetur.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda eligendi error est ex exercitationem expedita fugiat illum, in iusto provident quia recusandae, repellat saepe ut voluptate? Aperiam facilis impedit neque?</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos fugit magni nam nesciunt officiis porro sed tempore, temporibus unde. Aliquid architecto fugiat id quibusdam quo quos ratione vel veritatis!</p>
        </div>
    </div>

@endsection
