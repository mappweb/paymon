<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'guest'], function () {
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('home', \App\Livewire\Home::class)->name('home');
    Route::get('videos', \App\Livewire\Admin\Video\Index::class)->name('videos.index');

    Route::post('logout', function () {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});


