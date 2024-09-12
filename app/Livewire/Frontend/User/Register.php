<?php

namespace App\Livewire\Frontend\User;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|min:3')]
    public $name;

    #[Validate('required|email|unique:users,email')]
    public $email;

    #[Validate('required|min:6|confirmed')]
    public $password;

    public $password_confirmation;

    public function close() {
        $this->dispatch('register-form-close');
    }

    public function render()
    {
        return view('livewire.frontend.user.register');
    }

    public function openLogin() {
        $this->dispatch('login-form-open');
    }

    public function register() {
        $this->validate();
        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);
            session()->flash('success', 'A confirmation email has been sent to ' . $this->email . '. Please confirm first before login.');
            $this->password = $this->password_confirmation = $this->name = $this->email = '';
        } catch (QueryException $e) {
            $message = 'Unable to register! Please try again.';
            session()->flash('error', $message);
        }
    }
}
