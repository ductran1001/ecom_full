
<!DOCTYPE html>
<html lang="en">
	<head>
		@include('frontend.base.head')
    </head>
	<body>
        @include('frontend.base.header')

        @include('frontend.base.navigation')

		@yield('body')

        @include('frontend.base.newsletter')

		@include('frontend.base.footer')

        @include('frontend.base.script')
	</body>
</html>
