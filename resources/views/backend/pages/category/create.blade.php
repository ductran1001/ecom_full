@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Create New</strong> Category </h1>
            <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
        </div>
        <form class="row">
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="row mb-4">
                                <label class="col-form-label col-sm-2 text-sm-end">
                                    Title
                                    <span class="text-danger">(*)</span>
                                </label>
                                <div class="col-sm-10">
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="required">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-form-label col-sm-2 text-sm-end">
                                    Description
                                </label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control" placeholder="optional" rows="3"></textarea>
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
                            <select id="inputState" class="form-control">
                                <option selected="">[Choose Parent]</option>
                                <option value="0">None</option>
                            </select>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between gap-3">
                                <button name="status" type="submit" class="btn btn-outline-secondary w-100">
                                    Save Draft
                                </button>
                                <button name="status" type="submit" class="btn btn-primary w-100">
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
