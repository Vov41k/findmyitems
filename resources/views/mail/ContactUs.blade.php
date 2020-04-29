<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>

</head>
<body>
<div class="container">
    <br>
    @if(Auth::check())
        <h1>Message from : {{$user->name}} and his Email {{$user->email}}</h1>
    @endif
    <br>
    <p class="text-center"> Message from name {{$request->name}} and Email {{$request->email}}</p>
    <p>{{$request->message}}</p>


</div>


</body>
</html>