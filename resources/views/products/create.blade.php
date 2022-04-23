@extends('layouts.app')

@section('content')



    <div class="container">

        <h1 class="text-center mt-5 mb-2 pd-2">Create Page</h1>

        <div class="row mt-4 mb-3 pd-3 justify-content-center">
            <div class="col-md-6 mt-3 mb-3 pd-2">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="thumbnail">Upload Product Image</label>
                        <input type="file" name="thumbnail" class="form-control-file" id="thumbnail">
                      </div>
                    <div class="form-group mt-2">
                      <label for="title">Product Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group mt-2">
                        <label for="price">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
                    </div>

                    <div class="form-group mt-2">
                        <label for="title">Product Category</label>
                        <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Add Product</button>
                  </form>
            </div>
        </div>
    </div>

@endsection
