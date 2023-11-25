@php
    $action = isset($banner) ? route('banner.update', $banner['id']) : route('banner.store');
@endphp

<form id="do-form" class="row" action="{{ $action }}" method="POST" redirect="{{ route('banner.index') }}">
    @csrf
    @isset($banner)
        @method('PUT')
    @endisset
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
                            <input value="{{ $banner['name'] ?? '' }}" onkeyup="ChangeToSlug();" id="name"
                                name="name" type="text" class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="slug" class="col-form-label col-sm-3 text-sm-end">
                            Slug
                            <span class="required-text">(*)</span>
                        </label>
                        <div class="col-sm-9">
                            <input value="{{ $banner['slug'] ?? '' }}" id="slug" name="slug" type="text"
                                class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="position" class="col-form-label col-sm-3 text-sm-end">
                            Position
                            <span class="required-text">(*)</span>
                        </label>
                        <div class="col-sm-9">
                            <input id="position" value="{{ $banner['position'] ?? 0 }}" name="position" type="number"
                                class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Short Description
                        </label>
                        <div class="col-sm-9">
                            <textarea id="short_description" name="short_description" class="form-control" placeholder="optional" rows="3">{{ $banner['short_description'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Meta title
                        </label>
                        <div class="col-sm-9">
                            <textarea id="meta_title" name="meta_title" class="form-control" placeholder="optional" rows="3">{{ $banner['meta_title'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Meta description
                        </label>
                        <div class="col-sm-9">
                            <textarea id="meta_description" name="meta_description" class="form-control" placeholder="optional" rows="3">{{ $banner['meta_description'] ?? '' }}</textarea>
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
                                <input readonly value="{{ isset($banner['photo']) ? $banner['photo'] : '' }}"
                                    id="thumbnail" class="form-control" type="text" name="photo">
                            </div>
                            @if (isset($banner['photo']))
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                    <img src="{{ $banner['photo'] }}" alt=""
                                        style="width: 80px;height: 80px; object-fit: cover;" />
                                </div>
                            @else
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                            @endif
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
