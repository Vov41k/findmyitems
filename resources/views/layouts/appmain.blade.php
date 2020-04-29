<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FindMyItems</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Carter+One" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>


</head>
<body>

<!-- header -->
<div class="header">
    <div class="header-top">
        <!-- test -->

        <div class="paralax">
            <video class="vid3" src="{{asset('./videos/background/video1.mp4')}}" autoplay="" loop=""></video>

            <div class="container">
                <div class="row">
                    <div class="col-xl-2  col-6  order-2 order-xl-1">
                        <a href="{{route('welcomepage')}}" class="navbar-brand">
                            <img src="{{asset('images/logopit.png')}}" class="img-fluid logo">
                        </a>
                    </div>
                    <div class="col-xl-8 col-12  order-3 order-xl-2 text-center">
                        <br>
                        <h4 class="text-white">Search What You Want! </h4>


                    </div>

                    <div class="col-xl-2 col-6  order-2 order-xl-3">

                        <nav class="navbar navbar-expand float-right">

                            <ul class="navbar-nav">
                                @if(Route::has('login'))
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link text-light" href="{{route('home')}}">
                                                WELCOME: {{Auth::user()->name}}
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-light" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
                                                Exit
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>


                                    @else
                                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link text-light"
                                                                href="{{ route('register') }}">Register</a></li>
                                    @endauth
                                @endif


                            </ul>
                        </nav>

                    </div>

                </div>
            </div>


        </div>


        <!-- test -->

    </div>

    <div class="header-bottom">
        <div class="container">
            <!-- modal window -->

            <div class="modal modal-2 fade m-" id="contactUs" tabindex="-1" role="dialog"
                 aria-labelledby="contactUsTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal1">
                        <div class="modal-header f-">
                            <h5 class="modal-title" id="exampleModalLongTitle">CONTACT US</h5>
                            <button type="button" class="close cl-" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('contactus')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group f-">
                                    @if(($errors->has('name'))||$errors->has('email')||$errors->has('message'))
                                        <script>
                                            $(document).ready(function () {
                                                $('.modal-2').modal({show: true});
                                            })
                                        </script>


                                    @endif

                                    <label for="comment">YOUR NAME</label>
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('name') }}
                                        </div>


                                    @endif
                                    <input type="text" name="name" class="form-control">
                                    <label for="comment">YOUR EMAIL</label>
                                    <input type="email" name="email" @auth value="{{Auth::user()->email}}"
                                           @endauth  @guest value="" @endguest  class="form-control">
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('email') }}
                                        </div>


                                    @endif
                                    <label for="comment">YOUR MESSAGE</label>
                                    <textarea class="form-control" name="message" rows="5" id="comment"></textarea>
                                    @if($errors->has('message'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('message') }}
                                        </div>


                                    @endif
                                    <input type="submit" class="btn btn-danger submit-button" name="submit"
                                           value="Send">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!-- modal window -->

            <div class="row align-items-center menu-container">

                <div class="col-sm-6 col-12">
                    <form action="{{route('search')}}" method="get" class="searchform1">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group ">
                            <input type="text" class="form-control" id="searcheditemid" placeholder="Search"
                                   value="@yield('searchinput')" aria-label="Search" aria-describedby="basic-addon2"
                                   name="searcheditem">
                            <div class="input-group-append">
                                <button class="btn bg-danger" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-sm-6 col-12">
                    <nav class="navbar navbar-expand-sm  navbar-dark text-center nav-bar text-center ">

                        <button class="navbar-toggler x1" type="button" data-toggle="collapse"
                                data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center nav-menu" id="collapsibleNavbar">
                            <ul class="navbar-nav nav-bar-link nav1">

                                <li class="nav-item">
                                    <a class="nav-link text-light-link font-weight-bold {{$id
							        ===
							        'home' ?'active':''}}" href="{{route('welcomepage')}}">Home</a>
                                </li>
                                @foreach($categorys as $category)
                                    <li class="nav-item">
                                        <a class="nav-link text-light-link font-weight-bold {{$category->id==$id ?'active':''}}"
                                           href="{{route('showcategory',$category->id)}}"
                                           id="{{$category->id}}">{{$category->name}}</a>
                                    </li>
                            @endforeach
                            <!--  <li class="nav-item">
							        <a class="nav-link text-light-link font-weight-bold active" id="one" href="google.com" >Car</a>
							      </li> -->


                                <li class="nav-item">
                                    <a class="nav-link text-light-link font-weight-bold {{$id
							        ===
							        'news' ?'active':''}}" href="{{route('news')}}">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light-link font-weight-bold modal-w" href="#"
                                       data-toggle="modal" data-target="#contactUs">Contact US</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light-link font-weight-bold modal-w {{$id
							        ===
							        'chat' ?'active':''}}"" href="{{route('showchat')}}">Chat</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>


            </div>
        </div>
    </div>
    <!-- header-bottom -->


</div>
<!-- main -->
@yield('main')


<div class="content-bottom">
    <div class="container-fluid">

        <!--    <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-6 content-image-wraper"> <img src="https://images.pexels.com/photos/70912/pexels-photo-70912.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-fluid"></div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-6 content-image-wraper" > <img src="https://images.pexels.com/photos/1068523/pexels-photo-1068523.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" class="img-fluid"></div>
           </div> -->

    </div>
</div>
<!-- footer -->

<div class="footer">
    <div class="container">

        <div class="row footer-content">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <h2>MORE INFO</h2>
                <div class="links">
                    <ul class="">
                        <li class=""><a href="">INFO</a></li>
                        <li class=""><a href="">FAQ</a></li>
                        <li class=""><a href="">MEMBERSHIP</a></li>
                        <li class=""><a href="">LOCATIONS</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <h2>CONTACT US</h2>
                <p>CANADA,TORONTO</p>
                <p>OFFICE: New STRIK 26</p>
                <p>TEL:+188464654654</p>

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <h2>SUBSCRIBE TO US</h2>

                <form class="form-inline form-footer">

                    <div class="form-group mb-2">
                        <input type="text" name="subscribers" class="form-control">
                        <input type="submit" class="btn btn-warning" value="subscribe">
                    </div>


                </form>
            </div>
        </div>
        <marquee bgcolor="#ffcc00">
            <ul class="list-group d-inline-block">
                <li class="d-inline-block mr-5">This is the Test site</li>
                <li class="d-inline-block mr-5">This is the Test site</li>
                <li class="d-inline-block mr-5">This is the Test site</li>
                <li class="d-inline-block mr-5">This is the Test site</li>
            </ul>

        </marquee>

    </div>

</div>


<!-- footer -->


<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
<!-- 	<script type="text/javascript" src="{{asset('js/app.js')}}" defer></script> -->
<script type="text/javascript">


    $(document).ready(function () {
        if ($(window).width() < 960) {
            function close() {
                $('.x1').click()
            }

            setTimeout(close, 400)

        }

    })


</script>


</body>
</html>
