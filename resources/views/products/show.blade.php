@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
    <p>{{ $product->description }}</p>
    <p>Price: ${{ $product->price }}</p>
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <div class="input-group mb-3" style="max-width: 200px;">
            <input type="number" name="quantity" class="form-control" value="1" min="1">
            <button type="submit" class="btn btn-success">Add To Cart</button>
        </div>
    </form>
@endsection