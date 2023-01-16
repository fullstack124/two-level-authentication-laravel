<?php

use App\Http\Livewire\User\Auth\Login;
use App\Http\Livewire\User\Auth\Pattren;
use App\Http\Livewire\User\Auth\Register;
use App\Http\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'user_code_status'])->group(function () {
    Route::get('/', Profile::class)->name('profile');
});

Route::middleware(['auth','auth_user_code_status'])->group(function () {
    Route::get('/pattern', Pattren::class)->name('pattern');
});
Route::middleware(['guest'])->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});
