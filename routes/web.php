<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;

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
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/logout', function () {
        session()->flush();
        return redirect()->route('login');
    })->name('logout');
});
