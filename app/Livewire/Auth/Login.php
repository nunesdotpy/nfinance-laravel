<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Http\Controllers\Controller;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $request = $this->only(['email', 'password']);
        $response = Controller::fetch(env("API_URL")."login", "POST",$request);

        if($response['httpcode'] != 200){
            return back()->with('error', $response['message']);
        }

        session($response['data']);
        session()->save();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
