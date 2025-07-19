<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(Client $client)
    {
        return view('notes.index', ['client' => $client, 'notes' => $client->notes]);
    }

    public function create(Client $client)
    {
        return view('notes.create', compact('client'));
    }

    public function store(Request $request, $clientId)
    {
        $validatedData = $request->validate(['content' => 'required|string|max:1000']);
        $client = Client::findOrFail($clientId);

        if ($client->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        $client->notes()->create(['content' => $validatedData['content'], 'user_id' => Auth::id()]);

        return redirect()->route('clients.show', $clientId);
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        return view('notes.edit', ['note' => $note, 'client' => $note->client]);
    }

    public function update(Request $request, Note $note)
    {
        $validatedData = $request->validate(['content' => 'required|string']);

        if ($note->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        $note->update($validatedData);

        return redirect()->route('clients.show', $note->client_id);
    }

    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully.');
    }
}

