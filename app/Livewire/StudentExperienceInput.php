<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use Livewire\Component;

class StudentExperienceInput extends Component
{
    public StudentProfile $studentProfile;

    public $experiences = []; // temporary list for UI

    // Inputs for new experience
    public $title = '';
    public $company = '';
    public $start_date = '';
    public $end_date = '';
    public $description = '';

    public function mount(StudentProfile $studentProfile)
    {
        $this->studentProfile = $studentProfile;

        // Load existing experiences for edit
        // $this->experiences = $studentProfile->experiences->map(function($exp) {
        //     return [
        //         'id' => $exp->id,
        //         'title' => $exp->title,
        //         'company' => $exp->company,
        //         'start_date' => $exp->start_date,
        //         'end_date' => $exp->end_date,
        //         'description' => $exp->description,
        //     ];
        // })->toArray();
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

        // Reindex array to ensure Livewire detects the change
        // $this->experiences = array_values($this->experiences);

        // Reset input fields
        $this->title = '';
        $this->company = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->description = '';

        // Force Livewire to re-render the inputs
        $this->dispatchBrowserEvent('experienceReset');
    }

    // Remove experience from temporary array
    public function removeExperience($index)
    {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    // Save all experiences to DB
    public function saveExperiences()
    {
        // Remove existing experiences
        $this->studentProfile->experiences()->delete();

        // Save all from temporary array
        foreach ($this->experiences as $exp) {
            $this->studentProfile->experiences()->create($exp);
        }

        session()->flash('success', 'Experiences saved successfully!');
    }

    public function render()
    {
        return view('livewire.student-experience-input');
    }
}
