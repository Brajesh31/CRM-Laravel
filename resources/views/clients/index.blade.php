@extends('layouts.app')

@section('content')
<h2>Clients</h2>
<a href="{{ route('clients.create') }}">Add New Client</a>
<ul>
    @foreach($clients as $client)
        <li>
            {{ $loop->iteration }}.
            <a href="{{ route('clients.show', $client) }}">{{ $client->name }}</a>
            <a href="{{ route('clients.edit', $client) }}">Edit</a>
            <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection

