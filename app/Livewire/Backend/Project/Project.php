<?php

namespace App\Livewire\Backend\Project;

use App\Models\Project as ModelsProject;
use Livewire\Component;
use Livewire\WithPagination;

class Project extends Component
{
    use WithPagination;


    protected $listeners = [
        'close-project-add' => 'closeFormAdd'
    ];

    public $formVisible = false;
    public $projectID = null;

    public function openFormAdd() {
        $this->formVisible = true;
    }
    
    public function closeFormAdd() {
        $this->formVisible = false;
        $this->projectID = null;
    }

    public function render()
    {
        $projects = ModelsProject::where('user_id', Auth()->user()->id)->orderBy('id', 'desc')->paginate(6);
        return view('livewire.backend.project.project', ['projects' => $projects]);
    }

    public function edit($id) {
        $this->projectID = $id;
    }
}
