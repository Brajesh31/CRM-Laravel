@extends('layouts.app')

@section('content')
<h1>{{ $client->name }}</h1>
<p>Email: {{ $client->email }}</p>
<p>Phone: {{ $client->phone }}</p>


<form action="{{ route('notes.store', $client->id) }}" method="POST">
    @csrf
    <div>
        <label for="content">Add Note:</label>
        <textarea id="content" name="content" required></textarea>
    </div>
    <button type="submit">Add Note</button>
</form>

<h2>Notes</h2>
@if($client->notes->count())
    <ul>
        @foreach($client->notes as $note)
            <li>
                {{ $loop->iteration }}.
                {{ $note->content }}
                @if(Auth::id() === $note->user_id)
                    <a href="{{ route('notes.edit', $note->id) }}">Edit</a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No notes available.</p>
@endif
@endsection
