<?php

namespace App\Livewire\Frontend\Project;

use Livewire\Component;

class Create extends Component
{
    public function close() {
        $this->dispatch('close-project-add');
    }

    public function render()
    {
        return view('livewire.frontend.project.create');
    }
}
