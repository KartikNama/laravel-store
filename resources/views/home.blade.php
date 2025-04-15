@extends('layouts.app')
@section('title','Home')
@section('content')
<h1 class="text-center">
    Welcome to Our Store
</h1>
<a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
@endsection