@extends('backend.pages.auth.base-auth')
@section('body_page')
    <div class="d-table-cell align-middle">

        <div class="text-center mt-4">
            <h1 class="h2">Get started</h1>
            <p class="lead">
                Start creating the best possible user experience for you customers.
            </p>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="m-sm-3">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Full name</label>
                            <input class="form-control form-control-lg" type="text" name="name"
                                placeholder="Enter your name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email"
                                placeholder="Enter your email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input class="form-control form-control-lg" type="password" name="password"
                                placeholder="Enter password" />
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="index.html" class="btn btn-lg btn-primary">Sign up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            Already have account? <a href="pages-sign-in.html">Log In</a>
        </div>
    </div>
@stop
