<?php

namespace App\Livewire\Frontend;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('We donate')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.home');
    }
}
