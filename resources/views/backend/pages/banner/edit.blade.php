@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Update</strong> Banner </h1>
            <a href="{{ route('banner.index') }}" class="btn btn-primary">Back</a>
        </div>
        @include('backend.pages.banner.form')
    </div>
@stop
@push('js')
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
