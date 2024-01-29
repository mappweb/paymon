<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\VideoForm;
use App\Models\Video as VideoModel;
use App\Repositories\Contracts\VideoRepositoryInterface;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithPagination;

class VideoComponent extends Component
{
    use WithPagination;

    /**
     * Open modal variables
     */
    public bool $flagOpenModal = false;
    public bool $flagOpenConfirmationModal = false;

    public VideoForm $video;
    private VideoRepositoryInterface $repository;

    /**
     * @param VideoRepositoryInterface $repository
     * @return void
     */
    public function boot(VideoRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->video->setReposiory($repository);
    }

    /**
     * @param $action
     * @return void
     */
    private function openCreateEditModal($action): void
    {
        $this->resetErrorBag();
        $this->flagOpenModal = $action;
    }

    /**
     * @return void
     */
    public function openCreateModal(): void
    {
        $this->video->reset();
        $this->openCreateEditModal(true);
    }

    /**
     * @param $id
     * @return void
     */
    public function openEditModal(VideoModel $video): void
    {
        $this->video->reset();
        $this->video->fill($video->toArray());
        $this->openCreateEditModal(true);
    }

    /**
     * @param VideoModel $video
     * @return void
     */
    public function openDestroyModal(VideoModel $video): void
    {
        $this->video->fill($video->toArray());
        $this->flagOpenConfirmationModal = true;
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function save()
    {
        $this->video->save();
        $this->flagOpenModal = false;
    }

    /**
     *
     * @return void
     */
    public function destroy(): void
    {
        $this->video->destroy();
        $this->flagOpenConfirmationModal = false;
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        $data['videos'] = $this->repository->paginate(10, ['*'], 'page', $this->getPage());

        return view('admin.video.index', $data);
    }
}
