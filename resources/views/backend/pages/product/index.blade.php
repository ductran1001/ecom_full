@extends('backend.base.main')
@section('body_page')
    <div class="container-fluid p-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h3"><strong>Lists</strong> Products </h1>
            <a href="{{ route('product.create') }}" class="btn btn-primary">Create New</a>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill card-table">
                    <table id="zero_config" class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Position</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td>
                                        <img style="max-height: 90px;max-width: 120px;" src="{{ $product['photo'] }}"
                                            alt="{{ $product['name'] }}">
                                    </td>
                                    <td>{{ $product['position'] }}</td>
                                    <td>{{ $product['created_at'] }}</td>
                                    <td>
                                        <span class="badge {{ $product['status'] == 1 ? 'bg-success' : 'bg-warning' }}">
                                            {{ $product['status'] == 1 ? 'active' : 'in-active' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $product['id']) }}" class="me-3">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" id="delete-action"
                                            data-url="{{ route('product.destroy', $product['id']) }}">
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
