<?php

namespace App\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Nav extends Component
{

    protected $listeners = [
        'login-form-close' => 'closeform',
        'login-form-open'   => 'openLogin',
        'register-form-open' => 'openregister',
        'register-form-close' => 'closeRegister'
    ];

    public $formOpened = false;
    public $registerRequested = false;

    public function openLogin() {
        $this->formOpened = true;
        $this->registerRequested = false;
    }

    public function closeform() {
        $this->formOpened = false;
    }

    public function openregister() {
        $this->formOpened = false;
        $this->registerRequested = true;
    }

    public function closeRegister() {
        $this->registerRequested = false;
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
