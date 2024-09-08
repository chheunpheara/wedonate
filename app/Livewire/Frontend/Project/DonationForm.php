<?php

namespace App\Livewire\Frontend\Project;

use Livewire\Component;

class DonationForm extends Component
{
    public function close() {
        $this->dispatch('donation-form-close');
    }

    public function render()
    {
        return view('livewire.frontend.project.donation-form');
    }
}
