<?php

use App\Livewire\Admin\Video;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', static function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], static function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::group(['middleware' => ['auth']], static function () {
    Route::get('home', Home::class)->name('home');
    Route::get('videos', Video::class)->name('videos.index');

    Route::post('logout', static function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});


