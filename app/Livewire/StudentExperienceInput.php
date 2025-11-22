<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use Livewire\Component;

class StudentExperienceInput extends Component
{
    public $experiences = [];

    // Inputs for new experience
    public $title = '';
    public $company = '';
    public $start_date = '';
    public $end_date = '';
    public $description = '';

    public function mount($initialExperiences = [])
    {
        $decoded = [];

        foreach ($initialExperiences as $exp) {
            $decoded[] = is_string($exp) ? json_decode($exp, true) : $exp;
        }

        $this->experiences = $decoded;
    }

    // Add experience to temporary array
    public function addExperience()
    {
        $this->validate([
            'title' => 'required|string',
            'company' => 'required|string',
        ]);

        // Add new experience to the temporary array
        $this->experiences[] = [
            'title' => $this->title,
            'company' => $this->company,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
        ];

        // Reset input fields
        $this->reset(['title', 'company', 'start_date', 'end_date', 'description']);
    }

    // Remove experience from temporary array
    public function removeExperience($index)
    {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    public function render()
    {
        return view('livewire.student-experience-input');
    }
}
