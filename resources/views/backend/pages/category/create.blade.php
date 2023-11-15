@extends('backend.base.main')
@section('body')
    @include('backend.base.breadcrumb', [
        'title_breadcrumb' => 'Category Form',
        'sub1' => [
            'title' => 'Category',
            'route' => 'category.index',
        ],
        'sub2' => [
            'title' => 'Create Category',
        ],
    ])
    <div class="wrapper wrapper-content animated fadeInRight">
        <form class="row" role="form" method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div>
                                    <div class="form-group">
                                        <label>
                                            Name
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input name="name" id="name" type="text" placeholder="Enter Name" class="form-control">
                                        @if ($errors->has('name'))
                                            <i class="help-block text-danger">{{ $errors->first('name') }}</i>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Slug
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input name="slug" id="slug" type="text" placeholder="Enter Name" class="form-control">
                                        @if ($errors->has('slug'))
                                            <i class="help-block text-danger">{{ $errors->first('slug') }}</i>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input name="position" type="number" min="0" value="0"
                                            placeholder="Enter Position" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta title</label>
                                        <textarea placeholder="Enter Meta title" name="meta_title" cols="4" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta description</label>
                                        <textarea placeholder="Enter Meta description" name="meta_description" cols="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div>
                                    <div class="form-group">
                                        <label>Parent Category</label>
                                        <select name="parent_id" class="form-control m-b" name="account">
                                            <option value="1">option 1</option>
                                            <option value="2">option 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Featured</label>
                                        <input name="featured" type="checkbox" class="js-featured" checked />
                                        <label class="ml-24">Menu</label>
                                        <input name="menu" type="checkbox" class="js-menu" checked />
                                    </div>
                                    <div class="form-group d-flex gap-10 mt-24">
                                        <button name="status" value="0" class="w-50 btn btn-w-m btn-default m-t-n-xs"
                                            type="submit">
                                            Save Draft
                                        </button>
                                        <button name="status" value="1" class="w-50 btn btn-w-m btn-primary m-t-n-xs"
                                            type="submit">
                                            Publish
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
