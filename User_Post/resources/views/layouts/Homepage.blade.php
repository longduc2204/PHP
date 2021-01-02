<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <link href="all.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <title>HomePage</title>
</head>

<body>
    <table>
        <tr>
            <div class="header">
                <div class="header-img">
                    <img src="{{asset('./img/logo.png')}}" alt="logo" class="header-logo">
                </div>
                <div class="header-time">
                    @php
                    $timestamp = time();
                    echo (date("F d, Y h:i:s", $timestamp));
                    @endphp
                </div>
                <div class="header-login">
                    <i class="fas fa-gem"></i>
                    <a class="link-login" href="{{ route('login.index') }}">Login</a>
                </div>
            </div>
        </tr>
        <hr class="horizontal">
        <tr>
            <div class="exam-element flex-grow-ele1">
                <a style="color: black" href="{{ route('Home.home') }}"><i class="fas fa-home"></i></a>
                @foreach ($category as $item)
                    <li style="flex-grow: 2">
                        <a href="{{ route('test', $item->id) }}" class="content-category"> {{ $item->name }}</a>
                    </li>
                @endforeach
            </div>
        </tr>
        <hr class="horizontal">
        <tr>
            @yield('content')
        </tr>
    </table>

</body>

</html>
