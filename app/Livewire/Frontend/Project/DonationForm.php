<?php

namespace App\Livewire\Frontend\Project;

use App\Models\Follower;
use App\Models\Project;
use App\Models\ProjectDonator;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DonationForm extends Component
{
    public $qr = 'https://cbx-prod.b-cdn.net/COLOURBOX52176810.jpg?width=800&height=800&quality=70';
    public $submitted = false;
    public $showProfile = true;
    public $follow = true;
    #[Validate('required|min:1|numeric')]
    public $amount = 5;
    public $statement = '';

    public $projectID;
    public $project;
    public function mount($projectID) {
        $this->projectID = $projectID;
        $this->project = Project::find($this->projectID);
    }

    public function close() {
        $this->dispatch('donation-form-close');
    }

    public function render()
    {
        return view('livewire.frontend.project.donation-form');
    }

    public function start() {
        $this->validate();
        $this->submitted = true;
        try {
            $userID = Auth()->user()->id;
            $project = ProjectDonator::where('user_id', $userID)
                ->where('project_id', $this->projectID)->first();
            if (is_object($project)) {
                ProjectDonator::where('user_id', $userID)
                    ->where('project_id', $this->projectID)
                    ->update(['amount' => $project->amount + $this->amount]);
            } else {
                ProjectDonator::create(
                    [
                        'project_id' => $this->projectID,
                        'user_id' => $userID,
                        'amount' => $this->amount
                    ]
                );
            }
            if ($this->follow) {
                $this->followCreator();
            } else {
                $this->unfollow();
            }

            session()->flash('success', 'Support has been submitted. Thank you very much.');
        } catch (Exception $e) {
            session()->flash('error', 'We encountered some issues. Please try again later!');
        }
    }

    public function followCreator() {
        Follower::follow($this->project->user->id);
    }

    public function unfollow() {
        Follower::unfollow($this->project->user->id);
    }
}
