<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.base.head')
    <style>
        input:focus,
        select:focus,
        textarea:focus {
            box-shadow: none !important
        }

        .required-text {
            color: #E87882
        }

        .card-table {
            padding: 24px 20px;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
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
