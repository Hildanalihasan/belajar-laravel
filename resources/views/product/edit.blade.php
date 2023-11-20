@extends('partials.main')
@section('container')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('product.update', $products->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body"></div>
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName"
                            placeholder="Enter name" value="{{ $products->name }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-select" id="category">
                            @foreach ($categories as $data)
                                <option value="{{ $data->id }}"
                                    {{ $products->category_id == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productCode">Product Code</label>
                        <input type="text" name="product_code" class="form-control" id="productCode"
                            placeholder="Enter Product Code" value="{{ $products->product_code }}">
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" class="form-control" id="unit" placeholder="unit"
                            value="{{ $products->unit }}">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter price"
                            value="{{ $products->price }}">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" class="form-control" id="stock" placeholder="Enter stock"
                            value="{{ $products->stock }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="desc" class="form-control" id="description"
                            placeholder="Enter Description" value="{{ $products->desc }}">
                    </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>


    </div>
@endsection
