<?php

namespace App\Livewire\Frontend\Project;

use Livewire\Component;

class ProjectDetail extends Component
{

    public $project;
    public $donators = [];
    public $topDonators = [];
    public $formOpened = false;
    public $loginFormOpened = false;
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
        $this->donators = [
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeRCsVvBWpqMB7xG-St5geqC7R_E3io4ksuQ&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCfFDGsQBGmlWgZw3EzdsXwJXUrlQx1eGO_g&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOZWVuTyNFM0AzfnJHagm-ps3BxfzRfHnvHw&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://letstryai.com/wp-content/uploads/2023/11/stable-diffusion-avatar-prompt-example-2.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://www.researchgate.net/publication/367406167/figure/fig4/AS:11431281114749674@1674655972860/Examples-of-created-female-top-and-male-bottom-avatars-facial-photographs-left.ppm'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltFTo1p0/1/0/1600w/canva-cute-anime-illustration-boy-avatar-d8N3f7Rn9aU.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://pyxis.nymag.com/v1/imgs/51b/28a/622789406b8850203e2637d657d5a0e0c3-avatar-rerelease.1x.rsquare.w1400.jpg'
            ]
            ,[
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltLW8CT0/1/0/1600w/canva-pastel-cute-cartoon-illustration-girl-avatar-6V9Fo6XRPLQ.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8ML3lGa0d7YLL1GPcNpOK0J-IB_MV1dXZ0w&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeRCsVvBWpqMB7xG-St5geqC7R_E3io4ksuQ&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCfFDGsQBGmlWgZw3EzdsXwJXUrlQx1eGO_g&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOZWVuTyNFM0AzfnJHagm-ps3BxfzRfHnvHw&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://letstryai.com/wp-content/uploads/2023/11/stable-diffusion-avatar-prompt-example-2.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://www.researchgate.net/publication/367406167/figure/fig4/AS:11431281114749674@1674655972860/Examples-of-created-female-top-and-male-bottom-avatars-facial-photographs-left.ppm'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltFTo1p0/1/0/1600w/canva-cute-anime-illustration-boy-avatar-d8N3f7Rn9aU.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://pyxis.nymag.com/v1/imgs/51b/28a/622789406b8850203e2637d657d5a0e0c3-avatar-rerelease.1x.rsquare.w1400.jpg'
            ]
            ,[
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltLW8CT0/1/0/1600w/canva-pastel-cute-cartoon-illustration-girl-avatar-6V9Fo6XRPLQ.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8ML3lGa0d7YLL1GPcNpOK0J-IB_MV1dXZ0w&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeRCsVvBWpqMB7xG-St5geqC7R_E3io4ksuQ&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCfFDGsQBGmlWgZw3EzdsXwJXUrlQx1eGO_g&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOZWVuTyNFM0AzfnJHagm-ps3BxfzRfHnvHw&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://letstryai.com/wp-content/uploads/2023/11/stable-diffusion-avatar-prompt-example-2.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://www.researchgate.net/publication/367406167/figure/fig4/AS:11431281114749674@1674655972860/Examples-of-created-female-top-and-male-bottom-avatars-facial-photographs-left.ppm'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltFTo1p0/1/0/1600w/canva-cute-anime-illustration-boy-avatar-d8N3f7Rn9aU.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://pyxis.nymag.com/v1/imgs/51b/28a/622789406b8850203e2637d657d5a0e0c3-avatar-rerelease.1x.rsquare.w1400.jpg'
            ]
            ,[
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltLW8CT0/1/0/1600w/canva-pastel-cute-cartoon-illustration-girl-avatar-6V9Fo6XRPLQ.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8ML3lGa0d7YLL1GPcNpOK0J-IB_MV1dXZ0w&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeRCsVvBWpqMB7xG-St5geqC7R_E3io4ksuQ&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCfFDGsQBGmlWgZw3EzdsXwJXUrlQx1eGO_g&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOZWVuTyNFM0AzfnJHagm-ps3BxfzRfHnvHw&s'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://letstryai.com/wp-content/uploads/2023/11/stable-diffusion-avatar-prompt-example-2.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://www.researchgate.net/publication/367406167/figure/fig4/AS:11431281114749674@1674655972860/Examples-of-created-female-top-and-male-bottom-avatars-facial-photographs-left.ppm'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltFTo1p0/1/0/1600w/canva-cute-anime-illustration-boy-avatar-d8N3f7Rn9aU.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://pyxis.nymag.com/v1/imgs/51b/28a/622789406b8850203e2637d657d5a0e0c3-avatar-rerelease.1x.rsquare.w1400.jpg'
            ]
            ,[
                'name' => '',
                'profile_photo' => 'https://marketplace.canva.com/EAFltLW8CT0/1/0/1600w/canva-pastel-cute-cartoon-illustration-girl-avatar-6V9Fo6XRPLQ.jpg'
            ],
            [
                'name' => '',
                'profile_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8ML3lGa0d7YLL1GPcNpOK0J-IB_MV1dXZ0w&s'
            ]
        ];

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
