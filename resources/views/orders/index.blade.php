@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <div class="container">
        <h2 class="mb-4">Your Orders</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($orders->isEmpty())
            <p>You have not placed any orders yet.</p>
        @else
            @foreach($orders as $order)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <span>Order #{{ $order->id }}</span>
                        <span><strong>Total:</strong> ${{ $order->total }}</span>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($order->items as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $item->product->name }}</strong><br>
                                        ${{ $item->price }} × {{ $item->quantity }}
                                    </div>
                                    <span>${{ $item->price * $item->quantity }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        Ordered on: {{ $order->created_at->format('d M Y, h:i A') }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
