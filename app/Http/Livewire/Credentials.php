<?php

namespace App\Http\Livewire;

use App\Models\Credential;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Credentials extends Component
{
    public function archivecredential($id)
    {
        $credential = Credential::findOrFail($id);
        $credential->archived = 1;
        $credential->update();
    }

    public function render()
    {

        $credentials = Credential::with([ 'user'])
            ->where('archived', 0)
            ->where('client_id', Auth::user()->id)
            ->latest()
            ->paginate(20);

        return view('livewire.credentials', compact('credentials'));
    }
}
