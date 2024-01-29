<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email;
    public $password;
    /**
     * @var string[]
     */
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function submit()
    {
        $this->validate();
        if (Auth::guard()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
        }
        session()->flash('status', __('auth.failed'));
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('auth.login')->layout('layouts.guest');
    }
}
