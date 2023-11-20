@extends('backend.pages.auth.base-auth')
@section('body_page')
    <div class="d-table-cell align-middle">

        <div class="text-center mt-4">
            <h1 class="h2">Welcome back!</h1>
            <p class="lead">
                Sign in to your account to continue
            </p>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="m-sm-3">
                    <form id="do-form" action="{{ route('post.admin.login') }}" method="POST"
                        redirect="{{ route('get.admin.dashboard') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control form-control-lg" type="email" name="email"
                                placeholder="Enter your email" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" class="form-control form-control-lg" type="password" name="password"
                                placeholder="Enter your password" />
                        </div>
                        <div>
                            <div class="form-check align-items-center">
                                <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me"
                                    name="remember-me" checked>
                                <label class="form-check-label text-small" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-lg btn-primary">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            Don't have an account? <a href="pages-sign-up.html">Sign up</a>
        </div>
    </div>
@stop

@push('js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('backend/assets/js/toastr-options.js') }}"></script>
    <script src="{{ asset('backend/assets/js/do-form.js') }}"></script>
    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif
@endpush
