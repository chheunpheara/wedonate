<?php

namespace App\Livewire\Frontend\Project;

use App\Models\ProjectDonator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class Donator extends Component
{
    use WithPagination;
    public $projectID;
    public $limit = 36;
    public function mount($project) {
        $this->projectID = $project;
        $total = ProjectDonator::where('project_id', $this->projectID)->count();
        if ($total == 0) return $this->redirect(url('/'));
    }

    public function render()
    {
        $donators = ProjectDonator::orderBy('amount', 'desc')
        ->where('project_id', $this->projectID)->paginate($this->limit);
        return view('livewire.frontend.project.donator', ['donators' => $donators]);
    }
}
