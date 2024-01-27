<?php

namespace App\Livewire\Admin\Video;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $flagOpenModal = false;
    protected $rules = [
        'video.label' => 'required|string',
        'video.url' => 'required|url',
    ];
    public $video = [
        'label' => '',
        'url' => '',
    ];

    public function openModal()
    {
        $this->resetErrorBag();
        $this->flagOpenModal = true;
    }

    public function edit($id)
    {
        $this->openModal();
        $this->video = Video::query()->findOrNew($id)->toArray();
    }

    public function createVideo()
    {
        $this->validate();
        $video = Video::query()->create($this->video);
        $this->flagOpenModal = false;
    }

    public function render()
    {
        $data['videos'] = Video::query()->paginate(10);
        return view('admin.index', $data);
    }
}
