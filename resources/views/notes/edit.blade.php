@extends('layouts.app')

@section('content')
<h2>Edit Note for {{ $client->name }}</h2>
<form action="{{ route('notes.update', $note->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="content">Note Content:</label>
        <textarea id="content" name="content" rows="4" required>{{ old('content', $note->content) }}</textarea>
    </div>
    <button type="submit">Update Note</button>
</form>
@endsection
