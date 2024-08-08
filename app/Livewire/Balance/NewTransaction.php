<?php

namespace App\Livewire\Balance;

use Livewire\Component;
use App\Http\Controllers\Controller;

class NewTransaction extends Component
{

    public $name;
    public $amount;
    public $type = "spent";
    public $description;
    public $date;
    public $category;
    public $userid;
    public $otherCategory;

    public function newTransaction()
    {
        $user = session()->all();
        $this->userid = $user['id'];
        if($this->category === 'other'){
            $this->category = $this->otherCategory;
        }
        $request = $this->only(['name', 'amount', 'type', 'description', 'date', 'category', 'userid']);

        $response = Controller::fetch(env("API_URL")."$this->type/register/$this->userid", "POST", $request, session("token"));

        if($response['httpcode'] != 200){
            return back()->with('error', $response['message']);
        }

        return redirect()->route('home')->with('success', $response['message']);
    }

    public function render()
    {
        return view('livewire.balance.new-transaction');
    }
}
