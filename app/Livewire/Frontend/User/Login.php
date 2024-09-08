<?php

namespace App\Livewire\Frontend\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required')]
    public $user;

    #[Validate('required')]
    public $password;

    public function close() {
        $this->dispatch('login-form-close');
    }

    public function render()
    {
        return view('livewire.frontend.user.login');
    }

    public function authenticate(Request $request) {
        $this->validate();
        $payload = [
            'email' => $this->user,
            'password' =>  $this->password
        ];
        if (Auth::attempt($payload)) {
            return $this->redirect('/projects');
        }

        session()->flash('error', 'User or password must be wrong!');
    }
}
