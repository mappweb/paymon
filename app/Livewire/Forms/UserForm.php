<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public $id;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|confirmed')]
    public $password;
    #[Validate('required|string')]
    public $password_confirmation;
    #[Validate('required|string')]
    public $first_name;
    #[Validate('required|string')]
    public $last_name;

    private UserRepositoryInterface $repository;

    /**
     * @param UserRepositoryInterface $repository
     * @return void
     */
    public function setReposiory(UserRepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * @throws ValidationException
     */
    public function save(): mixed
    {
        $this->validate();
        /**
         * @var User $user
         */
        $user = $this->repository->createOrUpdate($this->all(), $this->id);
        $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
        if (!empty($userRole)) {
            $user->attachRole($userRole);
        }
        return $user;
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        $this->repository->delete($this->id);
    }
}
