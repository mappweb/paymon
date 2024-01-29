<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterComponent extends Component
{
    /**
     * @var UserForm
     */
    public UserForm $user;

    /**
     * @param UserRepositoryInterface $repository
     * @return void
     */
    public function boot(UserRepositoryInterface $repository)
    {
        $this->user->setReposiory($repository);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submit()
    {
        /**
         * @var User $user
         */
        $user = $this->user->save();
        Auth::guard()->login($user);

        return redirect()->route('home');
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('auth.register')->layout('layouts.guest');
    }
}
