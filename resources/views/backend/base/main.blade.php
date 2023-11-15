<!DOCTYPE html>
<html>

<head>
    @include('backend.base.head')
</head>

<body>
    <div id="wrapper">
        @include('backend.base.navbar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                @include('backend.base.navbar-static-top')
            </div>
            @yield('body')
            @include('backend.base.footer')
        </div>
    </div>
    @include('backend.base.js')
</body>

</html>
