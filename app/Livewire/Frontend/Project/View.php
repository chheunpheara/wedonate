<?php

namespace App\Livewire\Frontend\Project;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class View extends Component
{

    public $viewedProject;
    public function mount($slug) {
        $id = (int)User::decryptit($slug);
        $this->viewedProject = Project::find($id);
    }

    public function render()
    {
        return view('livewire.frontend.project.view');
    }
}
