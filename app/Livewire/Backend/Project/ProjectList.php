<?php

namespace App\Livewire\Backend\Project;

use Livewire\Component;

class ProjectList extends Component
{
    public $cloneProjects = [];
    public function mount($projects) {
        $this->cloneProjects = $projects;
    }

    public function render()
    {
        $projects = $this->cloneProjects;
        return view('livewire.backend.project.project-list', ['projects' => $projects]);
    }
}
