<?php

namespace App\Livewire\Forms;

use App\Repositories\Contracts\VideoRepositoryInterface;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class VideoForm extends Form
{
    public $id;
    #[Validate('required|string')]
    public $label;
    #[Validate('required|url')]
    public $url;

    private VideoRepositoryInterface $repository;

    /**
     * @param VideoRepositoryInterface $repository
     * @return void
     */
    public function setReposiory(VideoRepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * @throws ValidationException
     */
    public function save(): void
    {
        $this->validate();
        $this->repository->createOrUpdate($this->all(), $this->id);
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        $this->repository->delete($this->id);
    }
}
