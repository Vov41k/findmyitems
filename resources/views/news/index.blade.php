@extends('layouts.appmain')



@section('main')

    <div class="main">
        <div class="container container-main">


            <div class="contents">
                <div class="row">

                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                        <h2 class="text-center text-light pt-4 pb-5">NEWS</h2>

                        <div class="row bg-light p-4">
                            @foreach($news as $news)
                                <div class="col-md-6 col-sm-6 col-12">
                                    <!-- ARTICLE -->
                                    <a href="{{route('shownews',$news->id)}}">
                                        <article class="article ">
                                            <div class="article-img text-center">

                                                <img src="{{asset($news->presentation_image_url)}}" alt="">

                                                <ul class="article-info">
                                                    <li class="article-type"><i class="fa fa-camera"></i></li>
                                                </ul>
                                            </div>
                                            <div class="article-body">
                                                <h4 class="article-title text-dark">{{$news->description_short}}</h4>
                                                <ul class="article-meta p-0">
                                                    <li><i class="fa fa-clock-o"></i>{{$news->created_at}}</li>
                                                    <li><strong class="text-dark">{{$news->user->nickname}}</strong>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </a>


                                    <!-- /ARTICLE -->
                                </div>
                            @endforeach


                        </div>


                    </div>


                </div>

            </div>


        </div>


    </div>



@endsection


