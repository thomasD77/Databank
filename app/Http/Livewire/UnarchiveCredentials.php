<?php

namespace App\Http\Livewire;

use App\Models\Credential;
use Livewire\Component;

class UnarchiveCredentials extends Component
{
    public function unArchiveCredential($id)
    {
        $credential = Credential::findOrFail($id);
        $credential->archived = 0;
        $credential->update();
    }

    public function render()
    {
        $credentials = Credential::where('archived', 1)
            ->where('archived', 1)
            ->latest()
            ->paginate(20);

        return view('livewire.unarchive-credentials', compact('credentials'));
    }
}
