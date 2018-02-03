<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/customcss.css">
</head>
<body>
    
    <div class="navbar">
        <li><img src="http://dogecoin.com/imgs/doge.png" alt=""></li>
        <li>This is such application, much global</li>
        <li class ="li-right"><a href="{{ route('login') }}">Login</a></li>
        <li class="li-right"><a href="{{ route('register') }}">Register</a></li>
    </div>
    @yield('content')
</body>
</html>