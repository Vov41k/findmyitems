@extends('layouts.appmain')



@section('main')


    <div class="main">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 d-none d-lg-none d-xl-block d-md-none d-sm-none ">
                    <div class="container">
                        <div class="list-side-menu">
                            <div class="list-group">

                                <h1 class="text-light">Last Added</h1>
                                <br>
                                <div class="row">
                                    @foreach($lastadditems as $item)
                                        <div class="col-xl-12 mb-2">
                                            <a href="{{route('showitem',$item->id)}}" class="bg-light rounded ">
                                                <article class="article row-article last-item-added mb-0">
                                                    <div class="article-img mb-0">

                                                        @if($item->thumbnail!=null)
                                                            <img class="card-img-top "
                                                                 src="{{asset($item->thumbnail->image_url)}}"
                                                                 alt="Card image cap">

                                                        @else

                                                            <img class="card-img-top" src="" alt="NO IMAGE">

                                                        @endif

                                                    </div>
                                                    <div class="article-body">
                                                        <div class="article-body-content">
                                                            <h3 class="article-title text-dark text-center article-body-text article-h3 animated  fadeInLeft">{{$item->brand}}</h3>

                                                            <p class="p-1  text-center article-body-text article-p animated  fadeInRight">{{$item->title}}</p>
                                                        </div>

                                                    </div>
                                                </article>
                                            </a>


                                        </div>

                                    @endforeach
                                </div>
                            <!--    @foreach($lastadditems as $item)
                                <a href="" class="bg-light rounded mb-2">
                                    <article class="article row-article last-item-added mb-0">
                                            <div class="article-img mb-0">

@if($item->thumbnail!=null)
                                    <img class="card-img-top " src="{{asset($item->thumbnail->image_url)}}" alt="Card image cap">

                                                    @else

                                    <img class="card-img-top" src="" alt="NO IMAGE">

@endif

                                        </div>
                                        <div class="article-body">
                                            <div class="article-body-content">
                                                <h3 class="article-title text-dark text-center article-body-text article-h3">{{$item->brand}}</h3>
                                                          <ul class="article-meta text-right">
                                                                         <li class=" p-3 article-body-text article-li"><i class="fa fa-clock-o"></i>{{$item->created_at}}</li>

                                                          </ul>
                                                       <p class="p-1  text-center article-body-text article-p">{{$item->title}}</p>
                                                  </div>

                                              </div>
                                      </article>
                              </a>
                              @endforeach -->
                            <!--     @foreach($news as $news2)

                                <a href="{{route('shownews',$news2->id)}}" class="list-group-item list-group-item-action list-group-item-dark">{{$news2->description_short}}</a>

                               @endforeach
                                    ul>li{hello}*50 -->
                            </div>

                        </div>

                    </div>

                </div>
                <div class=" d-none  d-xl-block col-xl-12 welcometext"><h1 class="text-light text-center">WELCOME</h1>
                </div>
                <div class="col-xl-8 col-lg-12 align-self-center">
                    <div class="container-fluid">
                        <!-- carousel -->
                        <div class="carousel">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner carousel-main">

                                    <div class="carousel-item active">
                                        <img class="d-block w-100"
                                             src="https://images.pexels.com/photos/249203/pexels-photo-249203.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                             alt="First slide">
                                        <div class="carousel-caption d-none d-md-block h-100 capt-h-100">
                                            <div class="text-slider">
                                                <h2 data-animation="animated bounceInDown">Searching somthing?</h2>
                                                <h2 data-animation="animated bounceInLeft">WE Will HELP</h2>
                                                <h2 data-animation="animated bounceInRight">WE ARE HERE</h2>
                                                <br>
                                                <div class="slider-buttons">
                                                    <div class="container-fluid">
                                                        <div class="row">

                                                            <div class="col-6"><a href="{{route('login')}}"
                                                                                  class="btn btn-login"
                                                                                  data-animation="animated zoomIn">Login</a>
                                                            </div>
                                                            <div class="col-6"><a href="{{route('register')}}"
                                                                                  class="btn btn-register"
                                                                                  data-animation="animated zoomIn">Register</a>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>

                                    </div>


                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                             src="https://images.pexels.com/photos/593172/pexels-photo-593172.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                             alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block h-100 capt-h-100">
                                            <div class="text-slider">
                                                <h2 data-animation="animated zoomIn">Lorem ipsum.</h2>
                                                <h2 data-animation="animated bounceInLeft">Lorem ipsum dolor.</h2>
                                                <h2 data-animation="animated bounceInLeft">Lorem ipsum.</h2>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                             src="https://images.pexels.com/photos/802412/pexels-photo-802412.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                             alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block h-100 capt-h-100">
                                            <div class="text-slider">
                                                <h2 data-animation="animated zoomIn" class="first-h2">Ohter Thext</h2>
                                                <h2 data-animation="animated bounceInLeft" class="text-h2">WE Will
                                                    HELP</h2>
                                                <h2 data-animation="animated bounceInRight" class="text-h3">WE ARE
                                                    HERE</h2>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 d-none d-lg-none d-xl-block d-md-none d-sm-none">
                    <div class="container">
                        <div class="list-side-menu">
                            <div class="list-group">
                                <h1 class="text-light">Last News</h1>
                                <br>
                                <div class="row">


                                    @foreach($news as $news2)
                                        <div class=" col-xl-12 mb-3">
                                            <a href="{{route('shownews',$news2->id)}}">
                                                <article class="article thumb-article im100">
                                                    <div class="article-img nsimage float-left mr-2">
                                                        <img src="{{asset($news2->presentation_image_url)}}" alt="">
                                                    </div>
                                                    <div class="article-body">

                                                        <p class="article-title text-light newsdescription">{{$news2->description_short}}</p>
                                                        <ul class="article-meta p-0 w-100">
                                                            <li class="newsdescription"><i
                                                                        class="fa fa-clock-o"></i>{{$news2->created_at}}
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </article>
                                            </a>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 ">
                    <div class="container">
                        <div class="baner-left d-none d-lg-none d-xl-block d-md-none d-sm-none">
                            <a href="{{ route('login') }}" class="ad">

                                <div class="ad-text">
                                    <h2>Looking for something?</h2>
                                    <p>WE WILL HELP!!!</p>
                                </div>

                                <ul class="phones">
                                    <li class="phone"></li>

                                </ul>
                                <ul class="bikes">
                                    <li class="bike"></li>
                                </ul>
                                <ul class="cars">
                                    <li class="car"></li>

                                </ul>

                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-xl-8 col-lg-12 center-content">
                    <div class="container container-main">


                        <div class="contents">
                            <div class="row">

                                <div class="newcontent col-sm-12 col-12 col-md-12 col-lg-12">
                                    <div class="row content-item">


                                        @foreach($items as $item)
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 first-item ">
                                                <a href="{{route('showitem',$item->id)}}" class="bg-light">
                                                    <article class="article thumb-article mb-0 ">
                                                        <div class="article-img mb-0 p-0">
                                                            @if($item->thumbnail!=null)
                                                                <img class="card-img-top"
                                                                     src="{{asset($item->thumbnail->image_url)}}"
                                                                     alt="Card image cap">

                                                            @else

                                                                <img class="card-img-top" src="" alt="NO IMAGE">

                                                            @endif


                                                        </div>
                                                        <div class="article-body position-absolute article-item-body bg-dark">

                                                            <h3 class="article-title">{{$item->title}}</h3>
                                                            <ul class="article-meta">
                                                                <li><i class="fa fa-clock-o"></i>{{$item->created_at}}
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-comments"></i> {{ $item->commentscount($item->id)}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </article>
                                                </a>

                                            </div>


                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            <!-- //// -->
                        </div>
                        <div class="text-center">{{$items->links()}}</div>

                    </div>


                </div>
                <div class="col-xl-2">
                    <div class="container">
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, magni.</p> -->
                        <div class="baner-left d-none d-lg-none d-xl-block d-md-none d-sm-none">
                            <a href="{{ route('login') }}" class="ad">

                                <div class="ad-text">
                                    <h2>Looking for something?</h2>
                                    <p>WE WILL HELP!!!</p>
                                </div>

                                <ul class="phones">
                                    <li class="phone"></li>

                                </ul>
                                <ul class="bikes">
                                    <li class="bike"></li>
                                </ul>
                                <ul class="cars">
                                    <li class="car"></li>

                                </ul>

                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>



@endsection
