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
        $userid = $this->user['id'];
        $transactions = Controller::fetch(env("API_URL") . "spent/index/$userid", "GET", null, session("token"));
        $this->transactions = $transactions['data'];
    }

    public function render()
    {
        return view('livewire.balance.user-transactions');
    }
}
