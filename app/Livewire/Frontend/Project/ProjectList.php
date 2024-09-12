<?php

namespace App\Livewire\Frontend\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectList extends Component
{

    public $viewedProject;
    public $index;
    public $limit = 10;
    public $offset = 0;
    public $projects = null;
    public $total = 0;
    public function mount() {
        $this->projects = $this->getProjects($this->offset);
        $this->viewedProject = $this->projects[0];
        $this->total = $this->getTotal();
    }

    private function getProjects($offset) {
        return Project::where('published', true)->orderBy('created_at', 'desc')->limit($this->limit)->offset($offset)->get();
    }

    public function getTotal() {
        return Project::where('published', true)->orderBy('created_at', 'desc')->count();
    }

    public function render()
    {
        return view('livewire.frontend.project.project-list');
    }

    public function viewProject($index) {
        $this->index = $index;
        $this->viewedProject = Project::where('published', true)->find($index);
    }

    public function openForm() {
        $this->dispatch('donation-form-open');
    }

    public function more() {
        $this->offset = $this->offset + $this->limit;
        $projects = $this->getProjects($this->offset);
        $this->projects->concat($projects);
        // dd($projects, $this->offset);
    }
}
