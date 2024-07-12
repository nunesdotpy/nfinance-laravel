<?php

namespace App\Livewire\Auth;

use App\Http\Controllers\Controller;
use Livewire\Component;

class Register extends Component
{   
    public $name;
    public $email;
    public $password;
    public $passwordVerify;

    public function register()
    {
        $request = $this->only(['name', 'email', 'password', 'passwordVerify']);
        Controller::fetch(env("API_URL")."register", "POST",$request);
        
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
