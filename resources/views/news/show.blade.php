@extends('layouts.appmain')



@section('main')

    <div class="main">
        <div class="container container-main">


            <div class="contents">
                <div class="row">

                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h2 class="text-center text-light pt-4 pb-5">NEWS</h2>

                        <h3 class="text-center text-light pt-4 pb-5">{{$news->title}}</h3>
                        <h3 class="text-center text-light pt-4 pb-5">{{$news->description_short}}</h3>


                        <div class="newcontent col-sm-11 col-12 col-md-12 col-lg-11 im100 p-4 description-news bg-light m-auto break-world">
                            <div class="col-xl-6 col-sm-6 col-12 im100 pb-4 text-center m-auto">
                                <img src="{{asset($news->presentation_image_url)}}">
                            </div>
                            {!!$news->description!!}
                            <div class="text-right">
                                <p>Created: {{$news->created_at}} by <strong>{{$news->user->nickname}}</strong></p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>


        </div>


    </div>



@endsection


