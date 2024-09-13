<?php

namespace App\Livewire\Frontend;

use App\Models\Follower;
use Livewire\Component;

class Follow extends Component
{
    public $project;
    public $followed = false;
    public function mount($project) {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.frontend.follow');
    }

    public function followCreator() {
        Follower::follow($this->project->user->id);
        $this->followed = true;
    }

    public function unfollow() {
        Follower::unfollow($this->project->user->id);
        $this->followed = false;
    }
}
