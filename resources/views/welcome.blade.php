<!doctype html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animal Sanctuary</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {

            color: #000000;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background: url("image/BackgroundGreen.jpg");
            /**background-image: url("image/BackgroundGreen.png");**/


        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: left;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {

            position: absolute;
            bottom: 200px;
            text-align: center;



        }

        .title {
            font-size: 25px;
            position: fixed;
            left: 1px;
            top: 1px;

        }
        .logo{
            position: center;
           align-content: center;


        }
        .rotate-diagonal-1 {
            -webkit-animation: rotate-diagonal-1 0.8s cubic-bezier(0.190, 1.000, 0.220, 1.000) alternate-reverse both;
            animation: rotate-diagonal-1 0.8s cubic-bezier(0.190, 1.000, 0.220, 1.000) alternate-reverse both;
        }
        @-webkit-keyframes rotate-diagonal-1 {
            0% {
                -webkit-transform: rotate3d(1, 1, 0, 0deg);
                transform: rotate3d(1, 1, 0, 0deg);
            }
            50% {
                -webkit-transform: rotate3d(1, 1, 0, -180deg);
                transform: rotate3d(1, 1, 0, -180deg);
            }
            100% {
                -webkit-transform: rotate3d(1, 1, 0, -360deg);
                transform: rotate3d(1, 1, 0, -360deg);
            }
        }
        @keyframes rotate-diagonal-1 {
            0% {
                -webkit-transform: rotate3d(1, 1, 0, 0deg);
                transform: rotate3d(1, 1, 0, 0deg);
            }
            50% {
                -webkit-transform: rotate3d(1, 1, 0, -180deg);
                transform: rotate3d(1, 1, 0, -180deg);
            }
            100% {
                -webkit-transform: rotate3d(1, 1, 0, -360deg);
                transform: rotate3d(1, 1, 0, -360deg);
            }
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            background: #ffffff;
        }
        .heading{
            margin-bottom: 30px;
            color: #5cd08d;
        }
        .container > a {
            padding: 2px 16px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            text-decoration: none;
            font-weight: 300;
            transition: 0.3s;
            border-radius: 5px;
            font-size: large;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            background-color: #4dc0b5;

        }
    </style>
</head>
<body >


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <div class="container">
                <a href="{{ url('/firstHome') }}">Portal</a>
                </div>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif


    <div class=" content">
            <div class = "title">
             <pre  class="heading"> Animal Sanctuary </pre>
            </div>
        <img class = "logo rotate-diagonal-1" src="image/logoPage.png" height="200"
             width="200" />

        </div>
    </div>
</div>
</body>
</html>
