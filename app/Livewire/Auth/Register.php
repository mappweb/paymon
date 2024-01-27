<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    protected $rules = [
        'user.email' => 'required|email',
        'user.password' => 'required|confirmed',
        'user.first_name' => 'required',
        'user.last_name' => 'required',
    ];

    public $user = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'password' => '',
    ];

    public function submit()
    {
        $this->validate();

        $user = User::query()->create($this->user);

        Auth::guard()->login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('auth.register')->layout('layouts.guest');
    }
}
