@extends('messages.index')

@section('message-content')
    <div class="container-fluid">
        <div class="row justify-content-center">


            <br>
            <h1 class="text-center text-light">Sent Messages</h1>
            <br>
            <div class="col-md-12 text-light">

                <div id="accordion">
                    @foreach($sentmessages as $message)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div class="container-fluid">

                                    <p class="mb-0">
                                    <p class="text-dark message-btn text-truncate" data-toggle="collapse"
                                       data-target="#{{$message->id}}" aria-expanded="true" aria-controls="collapseOne">
                <span class="font-weight-bold">
                   TO: {{$message->ToUser->nickname}} 
                  created : {{$message->created_at}}
                </span>

                                        <br>
                                        {{$message->message}}

                                    </p>
                                    <form method="post" action="{{route('destroysentmessage',$message->id)}}">
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
                    @endforeach


                </div>


            </div>


        </div>
    </div>
@endsection
