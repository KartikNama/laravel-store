@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<h1>Your Cart</h1>

@if($cartItems->count())
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₹{{ $item->product->price }}</td>
                    <td>₹{{ $item->product->price * $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Your cart is empty.</p>
@endif
@endsection
