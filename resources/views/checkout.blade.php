@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container">
        <h2 class="mb-4">Checkout</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <ul class="list-group mb-3">
                @foreach($cartItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item->product->name }}</strong><br>
                            ${{ $item->product->price }} × {{ $item->quantity }}
                        </div>
                        <span>${{ $item->product->price * $item->quantity }}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <strong>Total:</strong>
                    <strong>${{ $total }}</strong>
                </li>
            </ul>

            <form method="POST" action="{{ route('payment') }}">
                @csrf
                <input type="hidden" name="amount" value="{{ $total }}">
                <button type="submit" class="btn btn-primary">Proceed to Pay</button>
            </form>
        @endif
    </div>
@endsection
