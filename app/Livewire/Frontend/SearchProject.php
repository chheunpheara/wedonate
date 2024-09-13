<?php

namespace App\Livewire\Frontend;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class SearchProject extends Component
{
    public $projects;
    public $limit = 6;
    public $offset;
    public $total = 0;
    public $keyword = null;

    public function mount() {
        $this->projects = $this->getProjects($this->offset);
    }

    private function getProjects($offset, $keyword = null) {
        $projects = Project::where('published', true);
        if(isset($keyword)) {
            $projects = $projects->where('title', 'like', '%' . $keyword . '%');
        }
        $projects = $projects->where('due_date', '>=', date('Y-m-d'))
        ->orderBy('due_date', 'desc')
        ->limit($this->limit)
        ->offset($offset)
        ->get();

        return $projects;
    }

    public function getTotal() {
        return Project::where('published', true)->orderBy('created_at', 'desc')->count();
    }

    public function search() {
        $this->projects = $this->getProjects($this->offset, $this->keyword);
    }

    public function render()
    {
        return view('livewire.frontend.search-project');
    }

    public function close() {
        $this->dispatch('modal-search-hidden');
    }

    public function viewProject($id) {
        $id = User::cryptit($id);
        return $this->redirect(url('/project/' . $id));
    }
}
