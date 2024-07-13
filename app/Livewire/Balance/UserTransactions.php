<?php

namespace App\Livewire\Balance;

use App\Http\Controllers\Controller;
use Livewire\Component;

class UserTransactions extends Component
{
    public $user;
    public $transactions;

    public function mount()
    {
        // dd($this->user);
        // $this->transactions = Controller::fetch(env("API_URL")."/spent/index/$user->id", "GET", ["company_id" => session("company_id")], session("token"), 1);
    }

    public function render()
    {
        return view('livewire.balance.user-transactions');
    }
}
