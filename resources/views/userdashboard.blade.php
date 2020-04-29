@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="side-navbar">
                    <nav class="navbar navbar-expand-lg navbar-light admin-nav">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav-block bg-dark ">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('welcomepage')}}" target="_blank">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">My dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.showuserprofile')}}"> My Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.useritems')}}">Items</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('messages')}}">Messages</a>
                                </li>


                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-md-10">

                @hasSection('user-content')
                    @yield('user-content')
                @else
                    <div class="container">
                        <br>

                        <h1 class="text-center text-light">Welcome: {{Auth::user()->name}}</h1>
                        <br>
                        <hr>
                        <h2 class="text-light">Today: {{date('Y-m-d')}}</h2>
                        <h2 class="text-light">Time: <span id="time"></span></h2>
                        <div class="Users">
                            <h2 class="text-light"> Users Activity(Online):</h2>
                            @foreach($UsersOnlineActivity as $user)
                                @if($user->role=='admin')

                                    <span class="font-weight-bold text-danger">{{$user->name}} ,</span>
                                @else

                                    <span class="text-light">{{$user->name}} ,</span>

                                @endif



                            @endforeach
                        </div>

                    </div>


            @endif




            <!-- <div class="card"> -->

            <!--    <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                <div class="alert alert-success">
{{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
@endsection
