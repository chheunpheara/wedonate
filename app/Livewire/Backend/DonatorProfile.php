<?php

namespace App\Livewire\Backend;

use App\Models\Project;
use App\Models\ProjectDonator;
use App\Models\User;
use Livewire\Component;

class DonatorProfile extends Component
{
    public $user;

    public $creator;

    public $projects;

    public function mount($profileId, $creator) {
        $this->user = User::find($profileId);
        $this->creator = $creator;
        $projectIDs = Project::where('user_id', $creator)->pluck('id')->toArray();
        $this->projects = ProjectDonator::where('user_id', $profileId)
            ->whereIn('project_id', $projectIDs)->get();
    }

    public function render()
    {
        return view('livewire.backend.donator-profile');
    }

    public function close() {
        $this->dispatch('close-profile-view');
    }
}
