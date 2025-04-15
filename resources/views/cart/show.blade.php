@extends('layouts.app')

@section('content')
    <h2>Your Cart</h2>

    @if($cartItems->isEmpty())
        <p>No items in your cart.</p>
    @else
    <ul class="product-self">
    @foreach($cartItems as $item)
        <li class="mb-3 d-flex align-items-center justify-content-between border-bottom pb-2">
            <div class="d-flex align-items-center">
                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" style="width: 100px; height: 100px;" class="me-3">
                <div>
                    <strong>{{ $item->product->name }}</strong><br>
                    ${{ $item->product->price }} × 
                    <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 60px;">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                </div>
            </div>
            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
            </form>
        </li>
    @endforeach
</ul>


<div class="mt-4 text-end">
    <h4>Total: ${{ number_format($total, 2) }}</h4>
    <a href="{{ route('checkout') }}" class="btn btn-success mt-2">Proceed to Checkout</a>
</div>
    @endif
    
@endsection
