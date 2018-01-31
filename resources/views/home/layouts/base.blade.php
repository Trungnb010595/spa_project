<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="/favicon.ico">

    @yield('title')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ asset('home/css/my_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
@yield('css')
</head>
<body>
@yield('header')
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/mains') }}">
                    Shop Online
                    {{--{{ config('app.name', 'Shop-Online') }}--}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                    <li><a href="{{ route('exchange.index') }}" class="btn btn-block">Giao dịch</a></li>
                    <li><a href="{{ route('time_off.index') }}">NV nghỉ</a></li>
                    <li><a href="">Nhân viên</a></li>
                    <li><a href="">Khách Hàng</a></li>
                    <li><a href="">Sản Phẩm</a></li>
                    <li><a href="">Dịch vụ</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            123 <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href=""
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    @yield('content')
</div>
@include('home.layouts.footer')
@yield('item_clone')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
@yield('script')

</body>
</html>