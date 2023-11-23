@php
    $action = isset($category) ? route('category.update', $category['id']) : route('category.store');
@endphp

<form id="do-form" class="row" action="{{ $action }}" method="POST" redirect="{{ route('category.index') }}">
    @csrf
    @isset($category)
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
                            <input value="{{ $category['name'] ?? '' }}" onkeyup="ChangeToSlug();" id="name"
                                name="name" type="text" class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="slug" class="col-form-label col-sm-3 text-sm-end">
                            Slug
                            <span class="required-text">(*)</span>
                        </label>
                        <div class="col-sm-9">
                            <input value="{{ $category['slug'] ?? '' }}" id="slug" name="slug" type="text"
                                class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="position" class="col-form-label col-sm-3 text-sm-end">
                            Position
                            <span class="required-text">(*)</span>
                        </label>
                        <div class="col-sm-9">
                            <input id="position" value="{{ $category['position'] ?? 0 }}" name="position"
                                type="number" class="form-control" placeholder="required">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Short Description
                        </label>
                        <div class="col-sm-9">
                            <textarea id="short_description" name="short_description" class="form-control" placeholder="optional" rows="3">{{ $category['short_description'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Meta title
                        </label>
                        <div class="col-sm-9">
                            <textarea id="meta_title" name="meta_title" class="form-control" placeholder="optional" rows="3">{{ $category['meta_title'] ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-3 text-sm-end">
                            Meta description
                        </label>
                        <div class="col-sm-9">
                            <textarea id="meta_description" name="meta_description" class="form-control" placeholder="optional" rows="3">{{ $category['meta_description'] ?? '' }}</textarea>
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
                        <option {{ isset($category) && $category['parent_id'] == 0 ? 'selected' : '' }} value="0">
                            None
                        </option>
                        @foreach ($categories as $item)
                            <option value="{{ $item['id'] }}"
                                {{ isset($category) && $category['parent_id'] == $item['id'] ? 'selected' : '' }}>
                                {{ $item['name'] }}
                            </option>
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
