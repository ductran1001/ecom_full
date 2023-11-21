@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Lists</strong> Category </h1>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create New</a>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill card-table">
                    <table id="zero_config" class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Parent category</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['parent_id'] == 0 ? '___' : $category['parent_id'] }}</td>
                                    <td>{{ $category['created_at'] }}</td>
                                    <td>
                                        <span class="badge {{ $category['status'] == 1 ? 'bg-success' : 'bg-warning' }}">
                                            {{ $category['status'] == 1 ? 'active' : 'in-active' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $category['id']) }}" class="me-3">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" id="delete-action"
                                            data-url="{{ route('category.destroy', $category['id']) }}">
                                            <i class="align-middle text-danger" data-feather="x-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#zero_config');
    </script>
@endpush
