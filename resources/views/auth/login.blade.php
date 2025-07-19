@extends('layouts.app')

@section('content')
<h1>Login</h1>

<form action="{{ route('login.store') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection
