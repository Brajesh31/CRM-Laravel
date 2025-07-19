@extends('layouts.app')

@section('content')
<h2>Add Note for {{ $client->name }}</h2>
<form action="{{ route('notes.store', $client->id) }}" method="POST">
    @csrf
    <div>
        <label for="content">Add Note:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
    </div>
    <button type="submit">Add Note</button>
</form>
@endsection
