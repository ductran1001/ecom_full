@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Create New</strong> Product </h1>
            <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
        </div>
        <form id="do-form" class="row" action="{{ route('product.store') }}" method="POST"
            redirect="{{ route('product.index') }}">
            @csrf
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="row mb-4">
                                <label for="name" class="col-form-label col-sm-3 text-sm-end">
                                    Name
                                    <span class="required-text">(*)</span>
                                </label>
                                <div class="col-sm-9">
                                    <input onkeyup="ChangeToSlug();" id="name" name="name" type="text"
                                        class="form-control" placeholder="required">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="slug" class="col-form-label col-sm-3 text-sm-end">
                                    Slug
                                    <span class="required-text">(*)</span>
                                </label>
                                <div class="col-sm-9">
                                    <input id="slug" name="slug" type="text" class="form-control"
                                        placeholder="required">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="position" class="col-form-label col-sm-3 text-sm-end">
                                    Position
                                    <span class="required-text">(*)</span>
                                </label>
                                <div class="col-sm-9">
                                    <input id="position" value="0" name="position" type="number" class="form-control"
                                        placeholder="required">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-form-label col-sm-3 text-sm-end">
                                    Short Description
                                </label>
                                <div class="col-sm-9">
                                    <textarea id="short_description" name="short_description" class="form-control" placeholder="optional" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-form-label col-sm-3 text-sm-end">
                                    Meta description
                                </label>
                                <div class="col-sm-9">
                                    <textarea id="meta_description" name="meta_description" class="form-control" placeholder="optional" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-form-label col-sm-3 text-sm-end">
                                    Meta title
                                </label>
                                <div class="col-sm-9">
                                    <textarea id="meta_title" name="meta_title" class="form-control" placeholder="optional" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-form-label col-sm-3 text-sm-end">
                                    Image
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input readonly id="thumbnail" class="form-control" type="text" name="photo">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between gap-3">
                                <button name="status" value="0" class="btn btn-outline-secondary w-100">
                                    Save Draft
                                </button>
                                <button name="status" value="1" class="btn btn-primary w-100">
                                    Publish
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@push('js')
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
