<?php

namespace App\Livewire\Frontend\Project;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Creator extends Component
{
    use WithPagination;

    public $userID;

    public $total = 0;

    public $offset = 0;

    public $limit = 12;

    public $projects = [];

    public $project;

    public function mount($slug) {
        $this->userID = (int)User::decryptit($slug);
        $this->projects = $this->getProjects($this->offset);
        $this->project = $this->projects[0];
        $this->total = $this->getTotal();
    }

    private function getProjects($offset) {
        return Project::where('published', true)
        ->where('due_date', '>=', date('Y-m-d'))
        ->where('user_id', $this->userID)
        ->orderBy('due_date', 'desc')
        ->limit($this->limit)
        ->offset($offset)
        ->get();
    }

    private function getTotal() {
        return Project::where('published', true)
        ->where('user_id', $this->userID)
        ->orderBy('created_at', 'desc')
        ->count();
    }

    public function more() {
        $this->offset = $this->offset + $this->limit;
        $projects = $this->getProjects($this->offset);
        if (count($projects) > 0) {
            $this->projects = $this->projects->concat($projects);
            $this->dispatch('more-project-loaded', id: $projects[count($projects) - 1]->id);
        }
    }

    public function render()
    {
        return view('livewire.frontend.project.creator');
    }

    public function view($project) {
        $id = User::cryptit($project['id']);
        return $this->redirect(url('/project/' . $id));
    }
}
