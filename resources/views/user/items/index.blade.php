@extends('userdashboard')


@section('user-content')
    <!-- user-dashboard-content -->
    <div class="card content-card">

        <h1 class="text-center text-light">Items</h1>
        <div class="text-center">
            <br>
            <hr>
            <form action="{{route('user.searchmyitem')}}" method="post">
                <div class="form-group">

                    <div class="col-md-12">
                        <label for="searchitem" class="text-light">Search item</label>
                        <input type="text" class="form-control" id="searchitem"
                               placeholder="Enter item #id, brand or model name" name="searcheditem">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <button type="submit" class="btn btn-primary">Search</button>


                    </div>


                </div>

            </form>
        </div>
        <br>
        <a href="{{route('user.useritemcreate')}}" class="btn btn-warning font-weight-bold">Create Items</a>


        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                <tr>


                    <th scope="col">ID</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Modify</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <td>{{$item->brand}}</td>
                        <td>{{$item->model_name}}</td>
                        <td>{{$item->categorys->name}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>

                        @if(!$item->images->isEmpty())
                            <td><img src="{{asset($item->images[0]->url)}}" alt="image" width="50vw" height="50vh"></td>
                        @else
                            <td><img src="" alt="image" width="50vw" height="50vh"></td>
                        @endif
                        <td><a href="#">{{$item->user->name}}</a></td>
                        <td><a href="{{route('user.useredititem',$item->id)}}" class="btn btn-success">Modify</a></td>
                        <td>
                            <form action="{{route('user.useritemdelete',$item->id)}}" method="post">
                                {{method_field('DELETE')}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>


                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>


    </div>
    <!-- user-dashboard-content -->
@endsection