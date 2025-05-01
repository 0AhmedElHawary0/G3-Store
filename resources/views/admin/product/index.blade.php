@extends('admin.main_layout')


@section('page_content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Products</h6>

            <a href="{{ url('/admin/products/create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right">
                New Product
            </a>
        </div>

        <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td><img src="{{ $product->photo }}" width="200" /></td>
                            <td>
                                <a href="{{ url('/admin/products/edit/'.$product->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <a href="{{ url('/admin/products/delete/'.$product->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">
                                <div class="alert alert-warning" role="alert">
                                    No Data Found!
                                </div>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection