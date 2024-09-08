<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class Project extends Component
{
    public $projects = [];

    protected $listeners = [
        'close-project-add' => 'closeFormAdd'
    ];

    public $formVisible = false;

    public function openFormAdd() {
        $this->formVisible = true;
    }
    
    public function closeFormAdd() {
        $this->formVisible = false;
    }

    public function mount() {
        $this->projects = [
            [
                'title' => 'Project I',
                'description' => 'This is the project I which everybody can help donating to help our project and people',
                'banner' => 'https://media.istockphoto.com/id/1353332258/photo/donation-concept-the-volunteer-giving-a-donate-box-to-the-recipient-standing-against-the-wall.jpg?s=612x612&w=0&k=20&c=9AL8Uj9TTtrbHpM78kMp9fqjT_8EqpEekjdixeKUzDw=',
                'due_date' => date('d/M/Y', strtotime('+15 days'))
            ],
            [
                'title' => 'Project II',
                'description' => 'This is the project I which everybody can help donating to help our project and people',
                'banner' => 'https://img.freepik.com/free-photo/donate-sign-charity-campaign_53876-127165.jpg',
                'due_date' => date('d/M/Y', strtotime('+15 days'))
            ],
            [
                'title' => 'Project III',
                'description' => 'This is the project I which everybody can help donating to help our project and people',
                'banner' => 'https://t4.ftcdn.net/jpg/05/76/12/63/360_F_576126362_ll2tqdvXs27cDRRovBTmFCkPM9iX68iL.jpg',
                'due_date' => date('d/M/Y', strtotime('+15 days'))
            ],
            [
                'title' => 'Project IV',
                'description' => 'This is the project I which everybody can help donating to help our project and people. This is the project I which everybody can help donating to help our project and people. This is the project I which everybody can help donating to help our project and people. This is the project I which everybody can help donating to help our project and people',
                'banner' => 'https://www.shutterstock.com/shutterstock/photos/2145134953/display_1500/stock-photo-charity-donation-and-volunteering-concept-happy-smiling-male-volunteer-with-food-in-box-and-2145134953.jpg',
                'due_date' => date('d/M/Y', strtotime('+15 days'))
            ],
            [
                'title' => 'Project V',
                'description' => 'This is the project V which everybody can help donating to help our project and people',
                'banner' => 'https://plus.unsplash.com/premium_photo-1683140538884-07fb31428ca6?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZG9uYXRpb258ZW58MHx8MHx8fDA%3D',
                'due_date' => date('d/M/Y', strtotime('+15 days'))
            ],
        ];
    }

    public function render()
    {
        return view('livewire.frontend.user.project');
    }
}
