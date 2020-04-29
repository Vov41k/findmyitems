@extends('layouts.appmain')



@section('main')

    <div class="main">
        <div class="container container-main">


            <div class="contents">
                <div class="row">

                    <div class="newcontent col-sm-12 col-12 col-md-12 col-lg-12">
                        <div class="row content-item">
                            <!-- content  row-->

                            @if(!$item->images->isEmpty())
                                <div class="carousel-content">
                                    <div id="carouselitem" class="carousel slide col-sm-8 col-md-8 col-xl-12 col-lg-8"
                                         data-ride="carousel">

                                        <div class="carousel-inner">
                                            @foreach($item->images as $key=> $image)
                                                @if($key==0)
                                                    <div class="carousel-item active">

                                                        <img class="d-block w-100 active" src="{{asset($image->url)}}"
                                                             alt="First slide">

                                                    </div>
                                                @else
                                                    <div class="carousel-item">

                                                        <img class="d-block w-100" src="{{asset($image->url)}}"
                                                             alt="First slide">

                                                    </div>

                                                @endif
                                            @endforeach

                                        </div>
                                        <a class="carousel-control-prev" href="#carouselitem" role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselitem" role="button"
                                           data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>

                                    </div>
                                    <div class="container ">
                                        <div class="modal modal-3 fade bd-example-modal-lg modal-show" id="images"
                                             tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content modal-small-image">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">IMAGE</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body modal-small-image">
                                                        <img src="" class="modal-image">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="small-image">
                                            @foreach($item->images as $image)
                                                <div class="small-image-container">
                                                    <a href="#" class="small-image-link" data-toggle="modal"
                                                       data-target="#images">
                                                        <img class="d-block w-100 blocks" src="{{asset($image->url)}}"
                                                             alt="First slide">
                                                    </a>

                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center text-light">
                                    <br>

                                    <img src="" alt="No image yet" width="40%" height="40%;">
                                </div>


                            @endif


                            <div class="description col-12 col-md-12 col-sm-12 col-lg-12">
                                <ul class="nav nav-tabs" id="myTab" role="">
                                    <li class="nav-item">
                                        <a class="nav-link " id="description-tab" data-toggle="tab" href="#description"
                                           role="tab" aria-controls="home" aria-selected="true">DESCRIPTIONS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="message-tab" data-toggle="tab" href="#messages"
                                           role="tab" aria-controls="message" aria-selected="false">MESSAGES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                           role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade " id="description" role="tabpanel"
                                         aria-labelledby="description-tab">

                                        <p class="text-light"> created by: <span
                                                    class="font-weight-bold"> {{$item->user->nickname}}</span>
                                            at: {{$item->updated_at}}</p>
                                        <h2 class="text-center">{{$item->brand." ".$item->model_name}}</h2>
                                        <h4 class="text-center">Item: # {{$item->id}}</h4>
                                        <p>{{$item->title}}</p>
                                        <br>
                                        <p>{{$item->description}}</p>


                                    </div>
                                    <!-- messages tab -->
                                    <div class="tab-pane fade show active" id="messages" role="tabpanel"
                                         aria-labelledby="message-tab">

                                        <div class="text-center ">
                                            <h1>MESSAGES</h1>
                                            <div class="container as">
                                                <div class="sticked-botton">
                                                    <a href="#commenttoitem"
                                                       class="scrollbuttontext"><span></span><span></span><span></span>
                                                        <p class="sticked-botton-text">Live <br> Your <br>
                                                            Comment</p></a>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- start -->
                                        <br>
                                        @foreach($comments as $comment)
                                            <h1>MESSAGE</h1>
                                            <div class="col-sm-12 p0">
                                                <div class="row">
                                                    <div class="col-xl-2 col-sm-2 col-4">
                                                        <img src="{{asset($comment->user->photo_url)}}"
                                                             class="img-fluid img-thumbnail">
                                                    </div>
                                                    <!-- part -->
                                                    <div class="col-xl-10 col-sm-10 col-12 p0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <!-- col-12  166-->
                                                                <h2>
                                                                    From @if(isset($comment->user->nickname))
                                                                        {{$comment->user->nickname}}
                                                                    @else
                                                                        {{$comment->user->name}}


                                                                    @endif


                                                                </h2>
                                                                <p class="blockquote">{{$comment->created_at}}</p>
                                                                <p style="word-wrap: break-word;">{{$comment->comment}}</p>
                                                            </div>
                                                            <!-- end col 12 150 -->

                                                            <div class="col-12">
                                                            @auth
                                                                <!-- part 2 -->
                                                                    <div class="row comment-botton">

                                                                        @if((Auth::user()->id==$comment->user_id)||(Auth::user()->hasRole('admin')))
                                                                            <div class="col-12 col-sm-4">


                                                                                <a href="#"
                                                                                   class="btn btn-info editcomment"
                                                                                   data-attr="{{$comment->id}}">Edit</a>


                                                                            </div>
                                                                            <div class="col-12 col-sm-4">
                                                                                <form action="{{route('destroycomment',$comment->id)}}"
                                                                                      method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="_method"
                                                                                           value="DELETE">

                                                                                    <input type="submit"
                                                                                           class="btn btn-danger"
                                                                                           value="Delete">
                                                                                </form>
                                                                            </div>
                                                                        @endif
                                                                        @if(Auth::user()->id!=$comment->user_id)
                                                                            <div class="col-12 col-sm-4">
                                                                                <a class="text-light replay-message"
                                                                                   id="{{$comment->id}}"
                                                                                   href="#">Repley</a>
                                                                            </div>
                                                                        @endif

                                                                    </div>




                                                                    <!-- end part 2  -->

                                                                    <!-- part 3  -->
                                                                    @if((Auth::user()->id==$comment->user_id)||(Auth::user()->hasRole('admin')))
                                                                        <div class="col-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 hiddenReplay updatecomment{{$comment->id}}">
                                                                            <div class="live-message">
                                                                                <div class="close-form">
                                                                                    <button type="button"
                                                                                            class="close close-replay"
                                                                                            data-id="{{$comment->id}}"
                                                                                            aria-label="Close">
                                                                                        <span aria-hidden="true"
                                                                                              class="text-light">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="{{route('updatecomment',$comment->id)}}"
                                                                                      method="post">
                                                                                    @csrf
                                                                                    {{ method_field('PATCH') }}
                                                                                    <div class="form-group">
                                                                                        <label for="comment">Your answer
                                                                                            was :</label>
                                                                                        <textarea class="form-control"
                                                                                                  rows="5" id="comment"
                                                                                                  name="comment">{{$comment->comment}}</textarea>
                                                                                        @if($errors->has('comment'))
                                                                                            <div class="alert alert-danger"
                                                                                                 role="alert">
                                                                                                {{ $errors->first('comment') }}
                                                                                            </div>
                                                                                        @endif
                                                                                        <input type="submit"
                                                                                               class="btn btn-danger submit-button"
                                                                                               name="submit"
                                                                                               value="Save">
                                                                                    </div>
                                                                                </form>

                                                                            </div>


                                                                        </div>
                                                                    @endif



                                                                <!-- end part 3  -->









                                                                @endauth


                                                            </div>
                                                            <!-- end col 12 169 -->
                                                            <br>
                                                            <!-- part 4  -->
                                                            <div class="col-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 hiddenReplay replay{{$comment->id}} p0">
                                                                <div class="live-message">
                                                                    <div class="close-form">
                                                                        <button type="button" class="close close-replay"
                                                                                data-id="{{$comment->id}}"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true" class="text-light">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <form action="{{route('createreplay',[$comment->id,$comment->user->id])}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="comment">Answer To:
                                                                                @if(isset($comment->user->nickname))
                                                                                    {{$comment->user->nickname}}
                                                                                @else
                                                                                    {{$comment->user->name}}


                                                                                @endif</label>
                                                                            @if($errors->has('message2'))
                                                                                <div class="alert alert-danger"
                                                                                     role="alert">
                                                                                    {{ $errors->first('message2') }}
                                                                                </div>
                                                                            @endif
                                                                            <textarea class="form-control" rows="5"
                                                                                      id="comment"
                                                                                      name="message2"></textarea>

                                                                            <input type="submit"
                                                                                   class="btn btn-danger submit-button"
                                                                                   name="submit" value="Send">

                                                                        </div>
                                                                    </form>


                                                                </div>
                                                            </div>


                                                            <!-- end[art 4 ] -->

                                                        </div>
                                                    </div>
                                                    <!-- xl 10 148 -->
                                                    <br>
                                                    <!-- part 5 -->
                                                    @foreach($comment->replays as $replay)
                                                        <h4>Answers</h4>
                                                        <div class="row">
                                                            <div class="col-sm-12 p0">
                                                                <div class="row">
                                                                    <div class="col-xl-2 col-sm-2 col-4 col-2">
                                                                        <img src="{{asset($replay->user->photo_url)}}"
                                                                             class="img-fluid img-thumbnail">
                                                                    </div>
                                                                    <div class="col-xl-8 col-sm-8 col-12 p0">
                                                                        <div class="row">
                                                                            <div class="col-10 col-xl-12">
                                                                                <h4>
                                                                                    From @if(isset($replay->user->nickname))
                                                                                        {{$replay->user->nickname}}
                                                                                    @else
                                                                                        {{$replay->user->name}}


                                                                                    @endif


                                                                                    TO: @if(isset($replay->userreplay->nickname))
                                                                                        {{$replay->userreplay->nickname}}
                                                                                    @else
                                                                                        {{$replay->userreplay->name}}


                                                                                    @endif


                                                                                </h4>
                                                                                <p class="blockquote">{{$replay->created_at}}</p>
                                                                                <p style="word-wrap: break-word;">{{$replay->message}}</p>
                                                                            </div>
                                                                            <div class="col-12 p0">
                                                                            @auth
                                                                                <!-- part 7 -->
                                                                                    <div class="row comment-botton">


                                                                                        @if((Auth::user()->id==$replay->from_user_id)||(Auth::user()->hasRole('admin')))
                                                                                            <div class="col-12 col-sm-4">

                                                                                                <a href="#"
                                                                                                   class="btn btn-info edit"
                                                                                                   data-attr="{{$replay->id}}">Edit</a>


                                                                                            </div>
                                                                                            <div class="col-12 col-sm-4">
                                                                                                <form action="{{route('destroyreplay',$replay->id)}}"
                                                                                                      method="POST">
                                                                                                    @csrf
                                                                                                    <input type="hidden"
                                                                                                           name="_method"
                                                                                                           value="DELETE">

                                                                                                    <input type="submit"
                                                                                                           class="btn btn-danger"
                                                                                                           value="Delete">
                                                                                                </form>
                                                                                            </div>
                                                                                        @endif
                                                                                        @if(Auth::user()->id!=$replay->from_user_id)
                                                                                            <div class="col-12 col-sm-4">
                                                                                                <a class="text-light replay-message2"
                                                                                                   id=""
                                                                                                   data-attr="{{$replay->id}}"
                                                                                                   href="#">Repley</a>
                                                                                            </div>
                                                                                        @endif


                                                                                    </div>


                                                                                    <!-- end part 7  -->


                                                                                    <!-- part 8 -->

                                                                                    @if((Auth::user()->id==$replay->from_user_id)||(Auth::user()->hasRole('admin')))
                                                                                        <div class="col-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 hiddenReplay update{{$replay->id}} p0">
                                                                                            <div class="live-message">
                                                                                                <div class="close-form">
                                                                                                    <button type="button"
                                                                                                            class="close close-replay"
                                                                                                            data-id="{{$replay->id}}"
                                                                                                            aria-label="Close">
                                                                                                        <span aria-hidden="true"
                                                                                                              class="text-light">&times;</span>
                                                                                                    </button>
                                                                                                </div>

                                                                                                <form action="{{route('updatereplay',$replay->id)}}"
                                                                                                      method="post">
                                                                                                    @csrf
                                                                                                    {{ method_field('PATCH') }}
                                                                                                    <div class="form-group p0">

                                                                                                        <label for="comment">Your
                                                                                                            answer was
                                                                                                            :</label>
                                                                                                        @if($errors->has('message2'))
                                                                                                            <div class="alert alert-danger"
                                                                                                                 role="alert">
                                                                                                                {{ $errors->first('message2') }}
                                                                                                            </div>
                                                                                                        @endif
                                                                                                        <textarea
                                                                                                                class="form-control"
                                                                                                                rows="5"
                                                                                                                id="comment"
                                                                                                                name="message2">{{$replay->message}}</textarea>

                                                                                                        <input type="submit"
                                                                                                               class="btn btn-danger submit-button"
                                                                                                               name="submit"
                                                                                                               value="Save">

                                                                                                    </div>
                                                                                                </form>

                                                                                            </div>


                                                                                        </div>
                                                                                    @endif





                                                                                <!-- end part 8  -->
                                                                                @endauth
                                                                            </div>
                                                                            <br>
                                                                            <!-- part 9    -->
                                                                            <div class="col-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 hiddenReplay replayMessage{{$replay->id}} p0">
                                                                                <div class="live-message">
                                                                                    <div class="close-form">
                                                                                        <button type="button"
                                                                                                class="close close-replay"
                                                                                                data-id="{{$replay->id}}"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true"
                                                                                                  class="text-light">&times;</span>
                                                                                        </button>
                                                                                    </div>

                                                                                    <form action="{{route('createreplay',[$comment->id,$replay->user->id])}}"
                                                                                          method="post">
                                                                                        @csrf
                                                                                        <div class="form-group">

                                                                                            <label for="comment">Answer
                                                                                                To:
                                                                                                @if(isset($replay->user->nickname))
                                                                                                    {{$replay->user->nickname}}
                                                                                                @else
                                                                                                    {{$replay->user->name}}


                                                                                                @endif:</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    rows="5"
                                                                                                    id="comment"
                                                                                                    name="message2"></textarea>
                                                                                            @if($errors->has('message2'))
                                                                                                <div class="alert alert-danger"
                                                                                                     role="alert">
                                                                                                    {{ $errors->first('message2') }}
                                                                                                </div>
                                                                                            @endif
                                                                                            <input type="submit"
                                                                                                   class="btn btn-danger submit-button"
                                                                                                   name="submit"
                                                                                                   value="Send">

                                                                                        </div>
                                                                                    </form>

                                                                                </div>
                                                                            </div>


                                                                            <!-- endpart 9 -->

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                @endforeach




                                                <!-- end part 5 -->


                                                    <!-- part -->

                                                </div>
                                            </div>
                                        @endforeach
                                        {{$comments->links()}}
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                                            <div class="live-message message-last">
                                                @auth
                                                    <form action="{{route('createcomment',$item->id)}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="comment">Comment:</label>
                                                            @if($errors->has('comment'))
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ $errors->first('comment') }}
                                                                </div>
                                                            @endif
                                                            <textarea class="form-control" rows="5" id="commenttoitem"
                                                                      name="comment"></textarea>

                                                            <input type="submit" class="btn btn-danger submit-button"
                                                                   name="submit" value="Send">

                                                        </div>
                                                    </form>
                                                @endauth


                                                @guest
                                                    <div class="text-center " id="no-login">
                                                        <p class="text-warning">
                                                            Please <a href="{{route('login')}}"
                                                                      class="text-info">login</a> to live your comments
                                                        </p>
                                                    </div>


                                                @endguest


                                            </div>
                                        </div>
                                    </div>

                                    <!-- end -->

                                    <!-- messages tab -->
                                    <!-- contact tab -->
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                         aria-labelledby="contact-tab">
                                        <div class="container-fluid contactinfo">
                                            <h2>Contact INFO</h2>
                                            <br>
                                            <p class="text-light"> created by: <span
                                                        class="font-weight-bold"> {{$item->user->nickname}}</span>
                                                at: {{$item->updated_at}}</p>
                                            <br>

                                            <p>Country: {{$item->country}}</p>
                                            <p>City: {{$item->city}}</p>
                                            <p>Street: {{$item->street_adress}}</p>
                                            <p>Phone: {{$item->phone}}</p>
                                            <p>Email: {{ $item->email}}</p>
                                        </div>


                                    </div>

                                    <!-- contact tab -->
                                    <!-- tab contents  -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>


    <script type="text/javascript" src="{{asset('./js/scroll.js')}}"></script>
@endsection

