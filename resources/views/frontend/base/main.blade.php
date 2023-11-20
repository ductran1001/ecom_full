<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.base.head')

    @stack('css')
</head>

<body>
    @include('frontend.base.preloader')

    @include('frontend.base.header')

    @yield('body')
    
    @include('frontend.base.shipping-info')

    @include('frontend.base.footer')

    @include('frontend.base.script')

    @stack('js')
</body>

</html>
