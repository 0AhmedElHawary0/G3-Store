@extends('admin.main_layout')


@section('page_content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Product</h6>
        </div>

        <div class="card-body">

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ url('/admin/products/store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Categories</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Product SKU</label>
                    <input type="text" class="form-control" name="sku">
                </div>

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" name="description" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" name="price">
                </div>

                <div class="form-group">
                    <label>Product Stock</label>
                    <input type="number" class="form-control" name="stock">
                </div>

                <div class="form-group">
                    <label>Product Photo</label>
                    <input type="file" class="form-control-file mb-2" name="photo">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection