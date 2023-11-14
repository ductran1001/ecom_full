@extends('backend.base.main')
@section('body')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-4 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="{{ asset('backend/img/avatar.jpg') }}" alt="Charles Hall"
                                            class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <form id="ajax_form" replace='{{ route('get.admin.home') }}'
                                        action="{{ route('post.admin.login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 form-wrapper">
                                            <label class="form-label">Địa chỉ email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                id="email" placeholder="Nhập địa chỉ email" />
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="mb-3 form-wrapper">
                                            <label class="form-label">Mật khẩu</label>
                                            <input class="form-control form-control-lg" autocomplete="off" type="password"
                                                id="password" name="password" placeholder="Nhập mật khẩu" />
                                            <span class="invalid-feedback"></span>
                                            <small>
                                                <a href={{ route('get.admin.forget_pass') }}>
                                                    Quên mật khẩu?
                                                </a>
                                            </small>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me"
                                                    name="remember-me" checked>
                                                <span class="form-check-label">
                                                    Ghi nhớ
                                                </span>
                                            </label>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button class="btn btn-lg btn-primary">
                                                Đăng nhập
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
@push('js')
    <script src="{{ asset('backend/js/ajax.js') }}"></script>
@endpush
