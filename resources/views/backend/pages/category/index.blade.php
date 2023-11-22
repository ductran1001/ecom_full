@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Lists</strong> Category </h1>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create New</a>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <table id="data_table" class="table table-striped my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Created At</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $category->created_at }}</td>
                                    <td>
                                        <span class="badge {{ $category->status == 1 ? 'bg-success' : 'bg-warning' }}">
                                            {{ $category->status == 1 ? 'active' : 'in-active' }}
                                        </span>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ route('category.edit', $category->id) }}" class="me-2">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </a>
                                        <a href="">
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#data_table');
    </script>
@endpush
