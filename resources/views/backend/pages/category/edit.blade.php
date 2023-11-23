@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Update</strong> Category </h1>
            <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
        </div>
        @include('backend.pages.category.form')
    </div>
@stop
