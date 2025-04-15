@extends('layouts.app')

@section('title', 'Payment Success')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success text-center">
        <h2 class="mb-3">🎉 Payment Successful!</h2>
        <p>Your payment has been successfully processed. Thank you for your order!</p>
        <a href="{{ url('/orders') }}" class="btn btn-success mt-3">View Your Orders</a>
    </div>
</div>
@endsection
