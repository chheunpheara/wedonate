<?php

namespace App\Livewire\Backend;

use App\Models\ProjectDonator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DonationActivityChart extends Component
{

    public $data;
    public function mount() {
        $this->getActivityChart();
    }

    private function getActivityChart() {
        $items = ProjectDonator::where('user_id', Auth()->user()->id)
        ->select(DB::raw('substr(created_at, 1, 10) as date, sum(amount) as total'))
        ->groupBy(DB::raw('substr(created_at, 1, 10)'))->orderBy(DB::raw('substr(created_at, 1, 10)'), 'desc')->get()->toArray();
        $data = [['Date', 'Amount($)']];
        foreach ($items as $item) {
            $data[] = [$item['date'], (float)$item['total']];
        }

        $this->data = json_encode($data);
    }

    public function render()
    {
        return view('livewire.backend.donation-activity-chart');
    }
}
