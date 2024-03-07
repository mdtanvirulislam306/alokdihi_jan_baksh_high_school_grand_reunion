<!doctype html>
<html class="no-js" lang="">
@include('layout.header')
<body>

@include('layout._partials._loader')
    @yield('content')
@include('layout.footer')
@include('layout._partials._toastify')
@yield('js')
</body>
</html>
