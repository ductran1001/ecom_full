@php
    $action = isset($product) ? route('product.update', $product['id']) : route('product.store');
@endphp
<form id="do-form" class="row" action="{{ $action }}" method="POST" redirect="{{ route('product.index') }}">
    @csrf
    @isset($product)
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
                            <input value="{{ $product['name'] ?? '' }}" onkeyup="ChangeToSlug();" id="name"
                                name="name" type="text" class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="slug" class="col-form-label col-sm-3 text-sm-end">
                            Slug
                            <span class="required-text">(*)</span>
                        </label>
                        <div class="col-sm-9">
                            <input value="{{ $product['slug'] ?? '' }}" id="slug" name="slug" type="text"
                                class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-form-label col-sm-3 text-sm-end">
                            Price
                            <span class="required-text">(*)</span>
                        </label>
                        <div class="col-sm-9">
                            <input id="price" value="{{ $product['price'] ?? 0 }}" name="price" type="number"
                                class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="position" class="col-form-label col-sm-3 text-sm-end">
                            Position
                            <span class="required-text">(*)</span>
                        </label>
                        <div class="col-sm-9">
                            <input id="position" value="{{ $product['position'] ?? 0 }}" name="position" type="number"
                                class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Short Description
                        </label>
                        <div class="col-sm-9">
                            <textarea id="short_description" name="short_description" class="form-control" placeholder="optional" rows="3">{{ $product['short_description'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Meta title
                        </label>
                        <div class="col-sm-9">
                            <textarea id="meta_title" name="meta_title" class="form-control" placeholder="optional" rows="3">{{ $product['meta_title'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Meta description
                        </label>
                        <div class="col-sm-9">
                            <textarea id="meta_description" name="meta_description" class="form-control" placeholder="optional" rows="3">{{ $product['meta_description'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Image
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail_photo" data-preview="holder_photo"
                                        class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input readonly value="{{ isset($product['photo']) ? $product['photo'] : '' }}"
                                    id="thumbnail_photo" class="form-control" type="text" name="photo">
                            </div>
                            <div id="photo"></div>
                            @if (isset($product['photo']))
                                <div id="holder_photo" style="margin-top:15px;max-height:100px;">
                                    <img src="{{ $product['photo'] }}" alt=""
                                        style="width: 80px;height: 80px; object-fit: cover;" />
                                </div>
                            @else
                                <div id="holder_photo" style="margin-top:15px;max-height:100px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Abums
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfms" data-input="thumbnail_abums" data-preview="holder_abums"
                                        class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input readonly value="{{ isset($product['abums']) ? $product['abums'] : '' }}"
                                    id="thumbnail_abums" class="form-control" type="text" name="abums">
                            </div>
                            <div id="abums"></div>
                            @if (isset($product['abums']))
                                <div id="holder_abums" style="margin-top:15px;max-height:100px;">
                                    <img src="{{ $product['abums'] }}" alt=""
                                        style="width: 80px;height: 80px; object-fit: cover;" />
                                </div>
                            @else
                                <div id="holder_abums" style="margin-top:15px;max-height:100px;">
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
