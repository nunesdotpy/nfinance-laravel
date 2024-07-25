<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Balance\UserTransactions;
use App\Livewire\Balance\NewTransaction;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return login
    return view('auth.login');
});

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::group(['middleware' => 'authenticateLogin'], function () {
    Route::get('/logout', function () {
        session()->flush();
        return redirect()->route('login');
    })->name('logout');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/balance', UserTransactions::class)->name('usertransaction');
    Route::get('/new', NewTransaction::class)->name('newtransaction');
});

Route::get('/{any}', function () {
    return redirect()->route('home');
})->where('any', '.*');
