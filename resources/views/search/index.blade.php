@extends('layouts.appmain')
@section('searchinput')

    {{$value}}
@endsection


@section('main')
    <!-- main -->
    <div class="main">
        <div class="container-fluid">
            <div class="row">


                <div class="col-xl-12 col-lg-12 center-content">
                    <div class="container container-main">


                        <div class="contents">
                            <div class="text-center">
                                <h1 class="text-light">You are searching for: {{$value}}</h1>
                            </div>

                            <div class="row">

                                <div class="newcontent col-sm-12 col-12 col-md-12 col-lg-12">
                                    <div class="row content-item">


                                        @foreach($itemsSearched as $item)
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
                        <div class="text-center">{{$itemsSearched->links()}}</div>

                    </div>


                </div>


            </div>
        </div>


    </div>



    <script type="text/javascript">
        $(document).on('click', '.pagination li a', function (e) {
            e.preventDefault();
            if ($(this).attr('href')) {
                var queryString = '';
                var allQueries = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                if (allQueries[0].split('=').length > 1) {
                    for (var i = 0; i < allQueries.length; i++) {
                        var hash = allQueries[i].split('=');
                        if (hash[0] !== 'page') {
                            queryString += '&' + hash[0] + '=' + hash[1];
                        }
                    }
                }
                window.location.replace($(this).attr('href') + queryString);
            }
        });


        var url = $('.searchform1').attr('action');
        var data = $('#searcheditemid').val();
        var number = 0;
        var page = -1;
        var content = $('.content-item');
        $(document).on('scroll', function () {

            // i++;
            // console.log('click');
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) { // this refers to window
                // y+=1;
                //      if(y==350){
                //      	y=-1;;

                //      }
                //
                if (page < number) {


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'get',
                        url: url,
                        // contentType: 'json',
                        data: {page: page, data: data},
                        // cache: false,
                        // processData: true,
                        success: function (data) {
                            console.log(data);

                            page = data[0];
                            var items = data[1];

                            for (var i in items) {


                                var item = "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 first-item'>" +
                                    "<div class='card' style='width: 18rem;'>" +
                                    '<img class="card-img-top" src=' + "http://findmyitems.com/" + items[i].photo + ' alt="Card image cap">' +
                                    '<div class="card-body">' +
                                    '<h5 class="card-title">' + items[i].title + '</h5>' +
                                    '<p class="card-text">' + items[i].brand + '</p>' +
                                    '<a href="{{route('showitem','+items[i].id+')}}" class="btn btn-primary btn-block">SHOW</a>' +
                                    '</div>' +
                                    "</div>" +
                                    "</div>"

                                content.append(item)


                            }


                        }
                    })
                }

            }


        })


    </script>




@endsection