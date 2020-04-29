@extends('layouts.appmain')



@section('main')

    <div class="main">
        <div class="container container-main">
            <div class="container-main-button">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <button id="openNav" class="btn btn-lg btn-block" style="font-size:20px;cursor:pointer">Open
                            Menu
                        </button>
                    </div>
                </div>
            </div>


            <div class="contents">
                <div class="row">
                    <div class="menu-hiden  col-lg-1">

                        <nav class="navbar navbar-dark menu ">

                            <ul class="navbar-nav nav-bar-link">
                                @foreach($filter as $key=>$value)
                                    <li class="nav-item">
                                        <a class="nav-link text-light font-weight-bold" href="#">{{$key}}</a>
                                        <ul class="submenu">
                                            @foreach($value as $key2=>$value2)
                                                <li><a href="{{route('filteritems',[$id,$key2])}}">{{$key2}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>


                                @endforeach

                            </ul>

                        </nav>
                    </div>
                    <div class="newcontent col-sm-11 col-12 col-md-12 col-lg-11">
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
                                                    <li><i class="fa fa-clock-o"></i>{{$item->created_at}}</li>
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

        <!-- content bottom  -->

    </div>



@endsection
