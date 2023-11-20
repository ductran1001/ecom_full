<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.base.head')
    @stack('css')
</head>

<body>
    <div class="wrapper">
        @include('backend.base.sidebar')

        <div class="main">
            @include('backend.base.navbar')

            <main class="content">
                @yield('body_page')
            </main>

            @include('backend.base.footer')
        </div>
    </div>

    @include('backend.base.script')
    @stack('js')
</body>

</html>
