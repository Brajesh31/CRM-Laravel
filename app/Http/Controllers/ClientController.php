<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Auth::user()->clients;
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        Auth::user()->clients()->create($validatedData);

        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        if ($client->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        $client->load('notes');
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        if ($client->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        if ($client->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        if ($client->user_id !== Auth::id()) {
            return redirect()->route('clients.index')->with('error', 'Unauthorized action.');
        }

        $client->delete();

        return redirect()->route('clients.index');
    }
}

