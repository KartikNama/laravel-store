@extends('layouts.app')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('content')
    <h1>Products
    </h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card">
                <a href="{{ route('products.show',$product->id) }}">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="head-center">{{ $product->name }}</h5>
                    <p class="head-center">${{ $product->price }}</p>
                    </a>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="number" name="quantity" class="form-control" value="1" min="1">
                            <button type="submit" class="btn btn-success">Add To Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection