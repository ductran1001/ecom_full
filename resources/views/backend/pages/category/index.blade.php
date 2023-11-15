@extends('backend.base.main')
@section('body')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Tables</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Tables</a>
                </li>
                <li class="active">
                    <strong>Data Tables</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Basic Data Tables example with responsive plugin</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>PARENT CATEGORY</th>
                                        <th>POSITION</th>
                                        <th>FEATURED</th>
                                        <th>MENU</th>
                                        <th>STATUS</th>
                                        <th>CREATEA AT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories ?? [] as $category)
                                        <tr>
                                            <td>{{ $category['name'] }}</td>
                                            <td>{{ $category['parent_id'] }}</td>
                                            <td>{{ $category['position'] }}</td>
                                            <td>{{ $category['featured'] }}</td>
                                            <td>{{ $category['menu'] }}</td>
                                            <td>{{ $category['status'] }}</td>
                                            <td>{{ $category['created_at'] }}</td>
                                            <td class="center d-flex gap-10">
                                                <a href="{{ route('category.edit', $category['id']) }}"
                                                    class="btn btn-xs btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="confirm-button btn btn-xs btn-danger">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NAME</th>
                                        <th>PARENT CATEGORY</th>
                                        <th>POSITION</th>
                                        <th>FEATURED</th>
                                        <th>MENU</th>
                                        <th>STATUS</th>
                                        <th>CREATEA AT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
