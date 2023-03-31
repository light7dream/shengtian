@include('layout.header')
@include('layout.topbar')
@include('layout.footer')
@include('layout.scripts')
<!doctype html>
<html class="no-js" lang="en">
@yield('header')
<body>

    <!--header area start-->
    @yield('topbar')
    <!--header area end-->
 
    @yield('content')

    <!--footer area start-->
    @yield('footer')
    <!--footer area end-->
    
    @yield('scripts')

</body>

</html>