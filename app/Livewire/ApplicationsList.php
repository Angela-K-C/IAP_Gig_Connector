<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;

class ApplicationsList extends Component
{
    public $search = '';

    public function render()
    {
        $user = auth()->user();

        $applications = Application::where('student_id', $user->id)
            ->whereHas('gig', function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })->get();


        return view('livewire.applications-list', compact('applications'));
    }
}
