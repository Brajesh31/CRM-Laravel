@extends('layouts.app')

@section('content')
<h2>Edit Client</h2>
<form action="{{ route('clients.update', $client) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $client->email }}" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $client->phone }}">
    </div>
    <button type="submit">Update Client</button>
</form>
@endsection
