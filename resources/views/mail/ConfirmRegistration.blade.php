<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>

</head>
<body>
<div class="container">
    <br>
    <h1>Hello : {{$user->name}}</h1>
    <p>To confirm your registration click on link</p>
    <p>YOUR CONFIRMATION LINK : <a href='{{url("/register/confirm/{$user->token}")}}'>Click Here to confirm</a></p>


</div>


</body>
</html>