<?php

namespace App\Livewire\User;

use App\Models\Video as VideoModel;
use Livewire\Component;
use Livewire\WithPagination;

class VideoComponent extends Component
{
    use WithPagination;

    public bool $flagOpenModal = false;
    public $searchVideo = '';
    public $url;

    /**
     * @param $id
     * @return void
     */
    public function openModal(VideoModel $video): void
    {
        $video->audit()->create();
        $this->url = $video->url;
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
