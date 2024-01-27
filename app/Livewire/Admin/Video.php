<?php

namespace App\Livewire\Admin;

use App\Models\Video as VideoModel;
use Livewire\Component;
use Livewire\WithPagination;

class Video extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public bool $flagOpenModal = false;
    public bool $flagOpenConfirmationModal = false;
    protected array $rules = [
        'video.label' => 'required|string',
        'video.url' => 'required|url',
    ];
    public array $video = [
        'id' => null,
        'label' => '',
        'url' => '',
    ];

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
        $this->video = [
            'id' => null,
            'label' => '',
            'url' => '',
        ];
        $this->openCreateEditModal(true);
    }

    /**
     * @param $id
     * @return void
     */
    public function openEditModal($id): void
    {
        $this->openCreateEditModal(true);
        $this->video = VideoModel::query()->findOrNew($id)->toArray();
    }

    /**
     * @param $id
     * @return void
     */
    public function openDestroyModal($id): void
    {
        $this->flagOpenConfirmationModal = true;
        $this->video = VideoModel::query()->findOrFail($id)->toArray();
    }

    /**
     * @return void
     */
    public function save()
    {
        $this->validate();
        VideoModel::query()->updateOrCreate(['id' => $this->video['id']], $this->video);
        $this->flagOpenModal = false;
    }

    /**
     *
     * @return void
     */
    public function destroy(): void
    {
        VideoModel::query()->findOrFail($this->video['id'])->delete();
        $this->flagOpenConfirmationModal = false;
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        $data['videos'] = VideoModel::query()->paginate(10);
        return view('admin.video.index', $data);
    }
}
