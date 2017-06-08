<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    {{--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/restaurant.css') }}">

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

    <title> Restourant</title>

</head>

<body>
<header>

{{--Bootstrap 4 navbar--}}
<div class="container">
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-primary bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-edge" aria-hidden="true"></i> <span class="logo font-face">Pizzeria</span></a>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('pages/contacts') }}">Contacts</a>
                </li>

                {{--@if (Auth::guest())--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('login') }}">Login</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">Register</a>--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ Auth::user()->name }} <span class="caret"">Register</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ Auth::user()->name }} <span class="caret"">Register</a>--}}
                    {{--</li>--}}
                {{--@enif--}}


                {{--dropdown menu--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if (Auth::guest())
                            <a class="dropdown-item" href="{{ route('login') }}">Login with your account</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Create new account</a>
                            <a class="dropdown-item" href="#">Login as an administrator</a>
                        @else
                            <ul class="dropdown-menu">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret">{{ Auth::user()->name }}</span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            </ul>
                        @endif
                    </div>
                </li>
                {{--end of dropdown menu--}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ({{ $cart -> getTotalQuantity() }})</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
</header>


{{--old menu--}}

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">Pizza Restaurant</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ({{ $cart -> getTotalQuantity() }})</a></li>

            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </div>
    </div>
</nav>
{{--end of old menu--}}




<main>
    <div class="container">
        @yield('content')
    </div>

</main>
<footer>
    <div class="container">
        <hr>
        <div class="text-center center-block">
            <p class="txt-railway">2017 | Copyright &copy;</p>
            <br />
            <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
            <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
            <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
        </div>
        {{--<hr>--}}
    </div>

    <br />
</footer>

</body>
</html>