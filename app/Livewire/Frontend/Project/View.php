<?php

namespace App\Livewire\Frontend\Project;

use Livewire\Component;

class View extends Component
{

    public function mount($slug) {

    }

    public function render()
    {
        return view('livewire.frontend.project.view');
    }
}
