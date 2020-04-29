@extends('messages.index')

@section('message-content')
    <div class="container-fluid">
        <div class="row justify-content-center">


            <br>
            <h1 class="text-center text-light">Create</h1>
            <br>


            <div class="col-md-12 text-light">

                <form action="{{route('sendmessage')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-light">To User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control destinationUser"
                                   data-url={{route('getnames')}}  placeholder="Name" name="destination">

                        </div>
                        @if($errors->has('destination'))

                            <div class="text-center">
                                <p class="text-center text-danger">
                                    {{$errors->first('destination')}}
                                </p>

                            </div>

                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-sm-2 col-form-label text-light">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="10" id="comment" name="message"></textarea>
                        </div>
                        @if($errors->has('message'))

                            <div class="text-center">
                                <p class="text-center text-danger">
                                    {{$errors->first('message')}}
                                </p>

                            </div>

                        @endif
                    </div>
                    <div class="showname form-group row ">

                        <label for="name" class="showname col-sm-2 col-form-label text-light"> Choise Name</label>


                        <div class="col-sm-10">

                            <div class="namesall">
                                <div class="names">

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary sndmsg">Send</button>
                        </div>
                </form>


            </div>


        </div>
    </div>
@endsection
