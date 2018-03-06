<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo asset('css/customcss.css')?>" type="text/css"> 
</head>
<body>
    <div class="navbar">
        <li><img src="http://dogecoin.com/imgs/doge.png" alt=""></li>
        <li><a href="/globalproject/public">This is such application, much global</a></li>
        @if(Auth::check())
            @if(Auth::user()->role == 'admin')
                <li><a href="viewApplications">View Competencies (for admins)</a></li>
                <li><a href="search">Search Competence (for admins)</a></li>
            @endif
        <li class="li-right">You are logged in</li>
        @endif
        @if(Auth::guest())
        <li class ="li-right"><a href="{{ route('login') }}">Login</a></li>
        <li class="li-right"><a href="{{ route('register') }}">Register</a></li>
        @endif
    </div>
    @yield('content')
</body>
</html>