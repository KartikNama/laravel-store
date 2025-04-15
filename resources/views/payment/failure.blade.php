@extends('layouts.app')

@section('title', 'Payment Failed')

@section('content')
<div class="container mt-5">
    <div class="alert alert-danger text-center">
        <h2 class="mb-3">❌ Payment Failed</h2>
        <p>We're sorry, but your transaction could not be completed.</p>
        <p class="text-muted">Possible reason: Incorrectly calculated hash or transaction error.</p>
        <a href="{{ url('/cart') }}" class="btn btn-danger mt-3">Return to Cart</a>
    </div>
</div>
@endsection
