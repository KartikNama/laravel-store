@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus />
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password" required />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
        </div>

        <button class="btn btn-primary" type="submit">Register</button>
    </form>
@endsection
