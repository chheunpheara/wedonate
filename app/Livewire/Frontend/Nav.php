<?php

namespace App\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Nav extends Component
{

    protected $listeners = [
        'login-form-close' => 'closeform'
    ];

    public $formOpened = false;
    public function openLogin() {
        $this->formOpened = true;
    }

    public function closeform() {
        $this->formOpened = false;
    }
    
    public function render()
    {
        return view('livewire.frontend.nav');
    }

    public function logout() {
        Auth::logout();
        return $this->redirect('/');
    }
}
