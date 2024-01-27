<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        if (Auth::guard()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
        }
        session()->flash('status', __('auth.failed'));
    }

    public function render()
    {
        return view('auth.login')->layout('layouts.guest');
    }
}
