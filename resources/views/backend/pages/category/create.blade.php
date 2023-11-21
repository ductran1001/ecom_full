@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Create New</strong> Category </h1>
            <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
        </div>
        <form id="do-form" class="row" action="{{ route('category.store') }}" method="POST"
            redirect="{{ route('category.index') }}">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <select id="parent_id" name="parent_id" class="form-control">
                                <option selected>[Choose Parent]</option>
                                <option value="0">None</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
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
