<?php

namespace App\Livewire;

use Livewire\Component;

class InterestsInput extends Component
{
    public $interests = [];
    public $interest = "";

    public function addInterest()
    {
        if (trim($this->interest) === '') {
            return;
        }

        $this->interests[] = $this->interest;
        $this->interest = '';
    }

    public function removeInterest($index)
    {
        unset($this->interests[$index]);
        $this->interests = array_values($this->interests);
    }

    public function render()
    {
        return view('livewire.interests-input');
    }
}
