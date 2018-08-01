<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:tel="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>



</head>
<body>
<header>
    <div class="container">
        {{--<img src="images/showcase.jpg" alt="logo">--}}
        <div id="branding">

            <h1><span class="highlight">E-DONATION
        </span></h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="{{route('index') }}">HOME</a></li>
                <li><a href="{{route('about') }}">ABOUT</a></li>
                <li><a href="{{ url('/registration') }}">REGISTER</a></li>
                <li><a href="{{ route('login') }}">LOGIN</a></li>

            </ul>
        </nav>
    </div>
</header>
@yield('content')




<footer class="fixed-bottom bg-dark">
    <div class="container">
        <span class="text-muted "><a class="text-white" href="tcsubas17@gmail.com"><h4><b>edonation@gmail.com</b></h4></a></span>
        <span class="text-muted "><a class="text-white" href="tel:9848719617"><h4><b>Contact:9848719617</b></h4></a></span>
    </div>
</footer>
</body>
</html>
