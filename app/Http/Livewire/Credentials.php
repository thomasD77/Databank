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

        $credentials = Credential::with([ 'user', 'client', 'subject'])
            ->where('archived', 0)
            ->latest()
            ->paginate(20);

        return view('livewire.credentials', compact('credentials'));
    }
}
