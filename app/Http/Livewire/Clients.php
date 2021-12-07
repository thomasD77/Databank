<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\User;
use Livewire\Component;

class Clients extends Component
{
    public function archiveClient($id)
    {
        $client = User::findOrFail($id);
        $client->archived = 1;
        $client->update();
    }

    public function render()
    {
        $clients = User::where('archived', 0)
            ->latest()
            ->paginate(10);

        return view('livewire.clients', compact('clients'));
    }
}
