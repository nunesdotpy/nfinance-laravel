<?php

namespace App\Livewire\Balance;

use App\Http\Controllers\Controller;
use Livewire\Component;

class UserTransactions extends Component
{
    public $transactions;
    public $hideTransaction;

    public function mount()
    {
        // pega a url atual
        $urlAtual = url()->current();
        $userid = session()->all()['id'];

        if ($urlAtual == route('transactions')) {
            $transactions = Controller::fetch(env("API_URL") . "all/index/$userid", "GET", null, session("token"));
            $this->transactions = $transactions['data'];
        }

        $transactions = Controller::fetch(env("API_URL") . "all/index/$userid", "GET", null, session("token"));
        $this->transactions = $transactions['data'];
    }

    public function delete($id)
    {
        $response = Controller::fetch(env("API_URL") . "transaction/delete/$id", "DELETE", null, session("token"));
        if ($response['httpcode'] != 200) {
            return back()->with('error', $response['message']);
        }

        $this->hideTransaction[$id]['id'] = $id;
   
        return back()->with('deleted');
    }

    public function render()
    {
        return view('livewire.balance.user-transactions');
    }
}
