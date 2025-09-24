<?php

namespace App\Livewire\IntakeWizard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class Wizard extends Component
{
    use WithFileUploads;

    public int $step = 1;
    public array $contact = [];
    public array $property = [];
    public array $problems = [];
    public string $severity = '';
    public string $duration = '';
    public array $files = [];

    public function next(){ $this->step++; }
    public function back(){ $this->step = max(1, $this->step-1); }

    public function submit()
    {
        // Basic client-side call to API
        $payload = [
            'contact' => $this->contact,
            'property'=> $this->property,
            'problems'=> array_values($this->problems),
            'severity'=> $this->severity,
            'duration'=> $this->duration,
        ];
        // In real app, use internal controller; for stub just display
        session()->flash('ok', 'Lead captured. Our team will be in touch.');
        return redirect()->route('intake.wizard');
    }

    public function render(){ return view('livewire.intake.wizard'); }
}
