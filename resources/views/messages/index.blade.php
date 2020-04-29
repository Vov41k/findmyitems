@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center" id="app2">

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
                                    <a class="nav-link homemsg" href="{{route('welcomepage')}}" target="_blank"
                                       data-id={{Auth::user()->id}}>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">My dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('createmessage')}}"> Create Message</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('receivemessage')}}">Received Message <kbd
                                                class='counts'>{{App\ReceivedMessages::newMessages()}}</kbd></a>
                                </li>
                            <!--    <li class="nav-item active">
                        <a class="nav-link" href="{{route('receivemessage')}}">Received Message</a>
                      </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('sentmessage')}}">Sent Messages</a>
                                </li>


                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-md-10">

                <br>
                <h1 class="text-center text-light">Messages</h1>

                <br>


                <br>

                <br>
                <div class="col-md-12  text-light messcontent">


                    @hasSection('message-content')
                        @yield('message-content')
                    @else
                        <div id="accordion">
                            @if($messagesreceived->isEmpty())
                                <br>
                                <h2 class="text-center">No New Messages</h2>


                            @endif
                            @foreach($messagesreceived as $message)
                                @if($message->read_msg=='no'||$message->read_msg=='NULL'||$message->read_msg=='')
                                    <div class="card2" data-id="{{$message->id}}"
                                         data-action="{{route('readmessage',$message->id)}}" name="readmsgs"
                                         data-toggle="collapse" data-target="#{{$message->id}}" aria-expanded="true"
                                         aria-controls="collapseOne">


                                        <div class="card-header  notreadmsg" id="headingOne">
                                            <div class="container-fluid">

                                                <p class="mb-0">
                                                <p class="text-dark message-btn text-truncate ">
                                                    <span class="font-weight-bold"> FROM: {{$message->fromUser->nickname}} created : {{$message->created_at}}</span>
                                                    <br>
                                                    {{$message->message}}

                                                </p>
                                                <form method="post"
                                                      action="{{route('destroyreceivedmessage',$message->id)}}">
                                                    {{ method_field('delete') }}
                                                    {!! csrf_field() !!}

                                                    <input type="submit" class="btn btn-danger" value="Delete">

                                                </form>
                                                </p>
                                            </div>
                                        </div>

                                        <div id="{{$message->id}}" class="collapse notreadmsg"
                                             aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body text-dark">
                                                {{$message->message}}
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                @else
                                    <div class="card" data-toggle="collapse" data-target="#{{$message->id}}"
                                         aria-expanded="true" aria-controls="collapseOne">
                                        <div class="card-header" id="headingOne">
                                            <div class="container-fluid">

                                                <p class="mb-0">
                                                <p class="text-dark message-btn text-truncate">

                                                    <span class="font-weight-bold"> FROM: {{$message->fromUser->nickname}}  created : {{$message->created_at}}</span>
                                                    <br>
                                                    {{$message->message}}

                                                </p>
                                                <form method="post"
                                                      action="{{route('destroyreceivedmessage',$message->id)}}">
                                                    {{ method_field('delete') }}
                                                    {!! csrf_field() !!}

                                                    <input type="submit" class="btn btn-danger" value="Delete">

                                                </form>
                                                </p>
                                            </div>
                                        </div>

                                        <div id="{{$message->id}}" class="collapse " aria-labelledby="headingOne"
                                             data-parent="#accordion">
                                            <div class="card-body text-dark">
                                                {{$message->message}}
                                            </div>

                                        </div>
                                    </div>
                                    <br>

                                @endif

                            @endforeach

                        </div>



                    @endif


                </div>


            </div>
        </div>
    </div>

    <!-- <script type="text/javascript" src="{{asset('js/app2.js')}}"></script> -->
@endsection
