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

        $this->topDonators = [
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUHo39qpflmX8v0rHUBOKvkPDMy8Az8DrsJg&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn86DMGD6PaQio8nhzWKwq4UGv_iLQOwTMSA&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSO4IPjULjl8ufw3oKgUTW3io9sUUNz1uZ9MQ&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREtkyXVnq0-7DoRS2HFHEjNQnfFubBkaNfmF9G-cQZZgaW3kn_rhF2MFXm2gIBm2m8qYA&usqp=CAU'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQd7Z6DVRuf4mREjG10cbRLjKPE9Gux4hT61kDjPxCZmtvsIbEZ8UhcGxKzvs8prs1m5CQ&usqp=CAU'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltLW8CT0/1/0/1600w/canva-pastel-cute-cartoon-illustration-girl-avatar-6V9Fo6XRPLQ.jpg'
            ]
        ];
    }

    public function openForm() {
        $this->formOpened = true;
    }
    
    public function render()
    {
        return view('livewire.frontend.project.project-detail');
    }
}
