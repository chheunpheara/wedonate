<?php

namespace App\Livewire\Frontend\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectList extends Component
{

    public $viewedProject;
    public $index;
    public $limit = 9;
    public $offset = 0;
    public $projects = null;
    public $total = 0;
    public function mount() {
        $this->projects = $this->getProjects($this->offset);
        $this->viewedProject = $this->projects[0];
        $this->total = $this->getTotal();
    }

    private function getProjects($offset) {
        return Project::where('published', true)
        ->where('due_date', '>=', date('Y-m-d'))
        ->orderBy('due_date', 'desc')
        ->limit($this->limit)
        ->offset($offset)
        ->get();
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
        if (count($projects) > 0) {
            $this->projects = $this->projects->concat($projects);
            $this->dispatch('more-project-loaded', id: $projects[count($projects) - 1]->id);
        }
    }
}
