<?php

namespace App\Livewire\Backend;

use App\Models\ProjectDonator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DonationActivity extends Component
{
    public $projects;
    public $limit = 50;
    public $offset = 0;
    public $total = 0;
    public $spent = 0;
    public function mount() {
        $this->projects = $this->getProjects($this->offset);
        $this->total = $this->getTotal();
        $this->spent = $this->getTotalDonatedAmount();
    }

    public function render()
    {
        return view('livewire.backend.donation-activity');
    }

    private function getProjects($offset) {
        return ProjectDonator::where('user_id', Auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->limit($this->limit)
        ->offset($offset)
        ->get();
    }

    private function getTotalDonatedAmount() {
        return ProjectDonator::where('user_id', Auth()->user()->id)->sum('amount');
    }

    private function getTotal() {
        return ProjectDonator::where('user_id', Auth()->user()->id)->orderBy('created_at', 'desc')->count();
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
