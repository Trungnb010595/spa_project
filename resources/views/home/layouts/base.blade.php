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
                <a class="navbar-brand" href="/customer/index">
                    <h1>Shop Tattoo</h1>
                    {{--{{ config('app.name', 'Shop-Online') }}--}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav ">
                    <!-- Authentication Links -->

                    <li><a href="{{ route('customer.index') }}" class="btn btn-block">Thông Tin Khách Hàng</a></li>
                    <li><a href="{{ route('employee.index') }}" class="btn btn-block">Thông Tin Nhân Viên</a></li>
                    <li><a href="{{ route('exchange.index') }}">Thông Tin Giao Dịch</a></li>
                    <li><a href="{{ route('time_off.index') }}">Thông Tin Chấm Công</a></li>
                    <li><a href="{{ route('product.index') }}">Thông Tin Sản Phẩm</a></li>
                    <li><a href="{{ route('service.index') }}">Thông Tin Dịch Vụ</a></li>
                    <li><a href="">Thống Kê</a></li>

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