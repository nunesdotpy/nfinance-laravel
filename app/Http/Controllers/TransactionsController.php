<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $user = session()->all();

        return view('transactions.index', compact('user'));
    }
}
