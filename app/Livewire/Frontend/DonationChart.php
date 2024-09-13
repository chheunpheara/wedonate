<?php

namespace App\Livewire\Frontend;

use App\Models\ProjectDonator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.blank')]
class DonationChart extends Component
{
    public $projectID;
    public $data = [];

    public function mount($project) {
        $this->projectID = (int)User::decryptit($project);
        $this->getData();
    }

    private function getData() {
        $items = ProjectDonator::where('project_id', $this->projectID)
        ->select(DB::raw('substr(created_at, 1, 10) as date, sum(amount) as total'))
        ->groupBy(DB::raw('substr(created_at, 1, 10)'))->orderBy(DB::raw('substr(created_at, 1, 10)'), 'desc')->get()->toArray();
        $data = [['Date', 'Amount($)']];
        foreach ($items as $item) {
            $data[] = [$item['date'], (float)$item['total']];
        }

        $this->data = json_encode($data);
    }

    public function updated() {
        $this->getData();
        $this->dispatch('test');
    }

    public function render()
    {
        return view('livewire.frontend.donation-chart');
    }
}
