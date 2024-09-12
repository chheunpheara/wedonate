<?php

namespace App\Livewire\Frontend\Project;

use App\Models\ProjectDonator;
use Livewire\Component;

class ProjectDetail extends Component
{

    public $project;
    public $donators = [];
    public $topDonators = [];
    public $formOpened = false;
    public $loginFormOpened = false;
    public $projectID;
    public $totalDonator = 0;
    public $limit = 36;
    protected $listeners = [
        'donation-form-close' => 'closeform',
        'donation-form-open' => 'openForm',
        'login-form-close' => 'closeform'
    ];

    public function closeform() {
        $this->formOpened = false;
    }

    public function mount($viewedProject) {
        $this->project = (object)$viewedProject;
        $this->projectID = $this->project->id;
        $this->donators = ProjectDonator::orderBy('amount', 'desc')
            ->where('project_id', $this->projectID)
            ->limit($this->limit)->get();

        $this->totalDonator = ProjectDonator::orderBy('amount', 'desc')
        ->count();

        $this->topDonators = $this->project->top_donators;
    }

    public function openForm() {
        $this->formOpened = true;
    }
    
    public function render()
    {
        return view('livewire.frontend.project.project-detail');
    }
}
