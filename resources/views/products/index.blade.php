@extends('layouts.app')

@section('content')

   <div class="container mt-4 mb-3 pd-4">
        <div class="row justify-content-center mt-4 mb-4 pd-3">

            <div class="col-md-10" style="display: flex;">
                @foreach ($products as $product)
                <div class="card m-2 p-2" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset($product->thumbnail) }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><b>{{ $product->title }}</b></h5>
                      <h5 class="card-title"><b class="text-success">{{ $product->category }}</b></h5>
                      <h5 class="card-title">$ {{ $product->price }}</h5>
                      <p class="card-text">{{ $product->description }}</p>
                      <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                      <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                  @endforeach
            </div>

            <div class="col-md-2">
                <a href="{{ route('product.search') }}" class="btn btn-primary">Search Products</a>
            </div>


        </div>
   </div>



@endsection
