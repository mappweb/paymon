<?php

namespace App\Livewire\User;

use App\Models\Video as VideoModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Video extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public bool $flagOpenModal = false;
    protected array $rules = [
        'video.label' => 'required|string',
        'video.url' => 'required|url',
    ];
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
     * @return mixed
     */
    public function render(): mixed
    {
        $data['videos'] = VideoModel::query()->paginate(10);
        return view('user.video.index', $data);
    }
}
