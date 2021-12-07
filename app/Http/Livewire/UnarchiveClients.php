<?php

namespace App\Http\Livewire;

use App\Models\client;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class UnarchiveClients extends Component
{
    public function unArchiveClient($id)
    {
        $client = User::findOrFail($id);
        $client->archived = 0;
        $client->update();
    }

    public function render()
    {
        $clients = User::where('archived', 1)
            ->latest()
            ->paginate(10);

        return view('livewire.unarchive-clients', compact('clients'));
    }
}
