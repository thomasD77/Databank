<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class Subjects extends Component
{
    public function archiveSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->archived = 1;
        $subject->update();

    }

    public function render()
    {
        $subjects = Subject::where('archived', 0)
            ->latest()
            ->paginate(10);
        return view('livewire.subjects', compact('subjects'));
    }
}
