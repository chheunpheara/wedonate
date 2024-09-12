<?php

namespace App\Livewire\Frontend\Project;

use Livewire\Attributes\Validate;
use Livewire\Component;

class DonationForm extends Component
{
    public $qr = 'https://cbx-prod.b-cdn.net/COLOURBOX52176810.jpg?width=800&height=800&quality=70';
    public $submitted = false;
    public $showProfile = true;
    public $follow = true;
    #[Validate('required|min:1|numeric')]
    public $amount = 5;
    public $statement = '';
    public function close() {
        $this->dispatch('donation-form-close');
    }

    public function render()
    {
        return view('livewire.frontend.project.donation-form');
    }

    public function start() {
        $this->validate();
        $this->submitted = true;
    }
}
