<?php

namespace App\Livewire\User;

use App\Models\Video as VideoModel;
use Livewire\Component;
use Livewire\WithPagination;

class Video extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public bool $flagOpenModal = false;
    public $searchVideo = '';
    public $url;

    /**
     * @param $id
     * @return void
     */
    public function openModal($id): void
    {
        $this->url = VideoModel::query()->findOrFail($id)->url;
        $this->flagOpenModal = true;
    }

    /**
     * @param $key
     * @return void
     */
    public function updating($key): void
    {
        if ($key === 'searchVideo') {
             $this->resetPage();
        }
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        $query = VideoModel::query();
        if (!empty($this->searchVideo)) {
             $query->where('label', 'like', "%{$this->searchVideo}%");
        }
        $data['videos'] = $query->paginate(10);
        return view('user.video.index', $data);
    }
}
