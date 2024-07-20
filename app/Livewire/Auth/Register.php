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
        $response = Controller::fetch(env("API_URL")."register", "POST",$request);
        
        if($response['httpcode'] != 200){
            return back()->with('error', $response['message']);
        }

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
