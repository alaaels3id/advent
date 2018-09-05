<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ text(GetSettings('sitename'), isAuthOrNot()) }} | @yield('title')</title>

    @include('site.inc.head')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    @yield('style')
</head>
<body class="animsition">
    
    @include('site.inc.header')

    @include('site.inc.cart')

    @yield('slider')
    
    @yield('banner')
        
    @yield('content')

    @include('site.inc.footer')

    @yield('script')

</body>
</html>