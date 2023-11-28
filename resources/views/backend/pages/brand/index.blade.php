@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Lists</strong> Brand </h1>
            <a href="{{ route('brand.create') }}" class="btn btn-primary">Create New</a>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill card-table">
                    <table id="zero_config" class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Thumbnail</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand['name'] }}</td>
                                    <td>
                                        <img style="max-height: 90px;max-width: 120px;" src="{{ $brand['thumbnail'] }}"
                                            alt="{{ $brand['name'] }}">
                                    </td>
                                    <td>{{ $brand['created_at'] }}</td>
                                    <td>
                                        <span class="badge {{ $brand['status'] == 1 ? 'bg-success' : 'bg-warning' }}">
                                            {{ $brand['status'] == 1 ? 'active' : 'in-active' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.edit', $brand['id']) }}" class="me-3">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" id="delete-action"
                                            data-url="{{ route('brand.destroy', $brand['id']) }}">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#zero_config');
    </script>
@endpush
