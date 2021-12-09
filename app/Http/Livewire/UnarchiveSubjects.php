<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class UnarchiveSubjects extends Component
{
    public function unArchiveSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->archived = 0;
        $subject->update();

    }

    public function render()
    {
        $subjects = Subject::where('archived', 1)
            ->latest()
            ->paginate(10);
        return view('livewire.unarchive-subjects', compact('subjects'));
    }
}
