<?php

namespace App\Livewire;

use Livewire\Component;

class GigsList extends Component
{
    public $search = '';

    public function render()
    {
        $user = auth()->user();

        $gigs = $user->provider->gigs()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->withCount('applications')
            ->get();


        return view('livewire.gigs-list', compact('gigs'));
    }
}
