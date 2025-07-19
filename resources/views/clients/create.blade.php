@extends('layouts.app')

@section('content')
<h2>Add New Client</h2>
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">
    </div>
    <button type="submit">Add Client</button>
</form>
@endsection
