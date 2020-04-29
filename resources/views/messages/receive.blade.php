@extends('messages.index')

@section('message-content')




    <div class="container-fluid">
        <div class="row justify-content-center">


            <br>
            <h1 class="text-center text-light">Recived Messages</h1>
            <br>
            <div class="col-md-12 text-light">

                <div id="accordion">
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
                                        <form method="post" action="{{route('destroyreceivedmessage',$message->id)}}">
                                            {{ method_field('delete') }}
                                            {!! csrf_field() !!}

                                            <input type="submit" class="btn btn-danger" value="Delete">

                                        </form>
                                        </p>
                                    </div>
                                </div>

                                <div id="{{$message->id}}" class="collapse notreadmsg" aria-labelledby="headingOne"
                                     data-parent="#accordion">
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
                                        <form method="post" action="{{route('destroyreceivedmessage',$message->id)}}">
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


            </div>


        </div>
    </div>
@endsection
