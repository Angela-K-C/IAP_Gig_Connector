<?php

namespace App\Livewire\Student;

use App\Models\Gig;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;

class GigsList extends Component
{
    public $search = '';

    public function render()
    {
        $user = auth()->user();

        $gigs = Gig::query()
            ->when($this->search, function($query) {
                $query->where('title', 'like', "%{$this->search}%")
                      ->orWhere('description', 'like', "%{$this->search}%");
            })
            ->latest()
            ->get();

        return view('livewire.student.gigs-list', [
            'gigs' => $gigs,
        ]);
    }
}
