<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        .sidenav a:hover {
            color: #f1f1f1;
        }
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        .top-left{
            position: absolute;
            font-size: 10px;
            left: 10px;
            top: 18px;;
        }
        .humburger{
            font-size:30px;
            cursor:pointer;
            color: #3D4852;
            padding: auto;
        }

    </style>
</head>
<body>
</div>
<div id="content">
    <main class="py-4">
        @yield('content')
    </main>
</div>
<div class=" top-left col-sm-4 col-sm-6 ">
<span class="humburger" onclick="openNav()">&#9776;</span>
    </div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ url('/') }}">
       Home
    </a>
    @guest
    @else
        @can ('admin', auth()->user())
    <a href="{{ url('animals') }}">List Of All Animals</a>
    <a  href="{{ url('animals/create') }}">Add an Animal</a>
    <a  href="{{ url('animals/pending') }}">View all Pending Requests</a>
    <a  href="{{ url('animals/request') }}">View All Requests</a>

        @endcan
        @cannot ('admin', auth()->user())
                <a  href="{{ url('animals') }}">List Of Available Animals</a>
                <a  href="{{ url('animals/pending') }}">View All Pending Requests</a>
                <a  href="{{ url('animals/request') }}">View All Request</a>
        @endcan
    @endguest

    @guest
            <a href="{{ route('login') }}">{{ __('Login') }}</a>

        @if (Route::has('register'))
                <a  href="{{ route('register') }}">{{ __('Register') }}</a>

        @endif
    @else
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
        @endguest
</div>

<script>
    /* Open the sidenav */
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("content").style.marginLeft = "250px";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0px"
        document.getElementById("content").style.marginLeft = "0px";
    }


</script>
</body>

</html>

