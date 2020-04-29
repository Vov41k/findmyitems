<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/summernote-bs4.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/summernote.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<!-- <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script> -->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote.css"> -->


</head>
<body class="body">
<div id="app2" class="homemsg" @auth data-id={{Auth::user()->id}} @endauth>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app2.js')}}"></script>

<script type="text/javascript" src="{{asset('js/script2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/timer.js')}}"></script>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote.js" defer></script> -->
<script type="text/javascript" src="{{asset('js/summernote.js')}}" defer></script>

<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> -->


<script type="text/javascript">

    $(document).ready(function () {


        $('#summernote').summernote({
            height: 200,


            callbacks: {
                onImageUpload: function (files, editor, welEditable) {


                    for (var i = files.length - 1; i >= 0; i--) {


                        sendFile(files[i], this);
                    }
                },
                // onMediaDelete : function($target, editor, $editable) {

                // console.log($target)
                // // alert($target.context.dataset.filename);
                // // DELETE FROM FORLDER
                // //
                //     $target.remove();
                //     }

            },

            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather']],
                ['fontsize', ['fontsize']],
                ["fontname", ["fontname"]],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['picture', 'link', 'video']],
                ['view', ['fullscreen', 'codeview']],

            ],

        });

    });

    function sendFile(file, el) {

        var form = document.forms.namedItem("campaignForm");
        var form_data = new FormData(form);
        form_data.append('file', file);

        var url = $('.form-class').data('url');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            data: form_data,
            type: "POST",
            url: url,

            cache: false,

            contentType: false,
            processData: false,


            success: function (data) {
                var image = data[1];

                var id = image.id;


                var link = "{{route('admin.deletenewsimage',':id')}}";
                var link = link.replace(":id", id);


                $('#summernote').summernote('editor.insertImage', 'http://findmyitems.com/' + image.image_url);
                var tr = '<tr class="image' + image.id + '">' +
                    '<td><img src="' + 'http://findmyitems.com/' + image.image_url + '" alt="image" width="50vw" height="50vh"></td>' +

                    '<td class="text-light">' + 'http://findmyitems.com/' + image.image_url + '</td>' +
                    '<td class="text-light">' +
                    "<form action=" + link + " method='post'>" +
                    '<input type="hidden" name="_method" value="delete">' +
                    // '{{method_field('DELETE')}}'+
                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                    "<input type='submit' name='submit' value='Delete' class='btn btn-danger deleteimg' data-id=" + image.id + ">" +
                    '</form>' +
                    '</td>' +


                    '</tr>';


                $('.tbody').append(tr);

            }
        });
    }

    $(document).ready(function () {
        $('body').on('click', '.deleteimg', function (e) {
            e.preventDefault();
            var buttonid = $(e.target).attr('data-id');
            url = $(e.target).parent().attr('action');
            var token = $(this).data('token');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                // data:form_data,
                type: "DELETE",
                url: url,
                // data: {_method: 'delete', _token :token},
                cache: false,

                contentType: false,
                processData: false,


                success: function (data) {

                    $(".image" + data).remove();


                }
            });


        })

    })


</script>


</body>
</html>
