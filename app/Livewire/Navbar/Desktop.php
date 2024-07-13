<?php

namespace App\Livewire\Navbar;

use Livewire\Component;

class Desktop extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.navbar.desktop');
    }
}
