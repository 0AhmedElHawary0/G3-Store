@extends('admin.main_layout')


@section('page_content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
        </div>

        <div class="card-body">

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ url('/admin/products/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}" />

                <div class="form-group">
                    <label>Categories</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)

                        <option value="{{ $category->id }}" 
                            @if ($category->id ==$product->category_id)
                                selected
                            @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Product SKU</label>
                    <input type="text" class="form-control" name="sku" value="{{ $product->sku }}">

                    <small class="text-danger">
                        @if ($errors->has('sku'))
                        {{ $errors->first('sku') }}
                        @endif
                    </small>
                </div>

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">

                    <small class="text-danger">
                        @if ($errors->has('name'))
                        {{ $errors->first('name') }}
                        @endif
                    </small>
                </div>

                <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" name="description" rows="5">{{ $product ->description }}</textarea>

                    <small class="text-danger">
                        @if ($errors->has('description'))
                        {{ $errors->first('description') }}
                        @endif
                    </small>
                </div>

                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}">

                    <small class="text-danger">
                        @if ($errors->has('price'))
                        {{ $errors->first('price') }}
                        @endif
                    </small>
                </div>

                <div class="form-group">
                    <label>Product Stock</label>
                    <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">

                    <small class="text-danger">
                        @if ($errors->has('stock'))
                        {{ $errors->first('stock') }}
                        @endif
                    </small>
                </div>

                <div class="form-group">
                    <label>Product Photo</label>
                    <input type="file" class="form-control-file mb-2" name="photo">
                    <img src="{{ $product->photo }}" width="200">

                    <small class="text-danger">
                        @if ($errors->has('photo'))
                        {{ $errors->first('photo') }}
                        @endif
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection