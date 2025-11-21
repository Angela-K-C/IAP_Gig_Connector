<?php

namespace App\Livewire;

use Livewire\Component;

class SkillsInput extends Component
{

    public $skills = [];
    public $skill = "";

    public function addSkill()
    {
        if (trim($this->skill) === '') {
            return;
        }

        $this->skills[] = $this->skill;
        $this->skill = '';
    }

    public function removeSkill($index)
    {
        unset($this->skills[$index]);
        $this->skills = array_values($this->skills);
    }

    public function render()
    {
        return view('livewire.skills-input');
    }
}
