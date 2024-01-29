<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $user = Auth::user();
        $query = Video::query();
        if($user->hasRole('user')){
            $query->whereHas('audit', function (Builder $builder) use ($user){
                $builder->where('created_by', '=', $user->id);
            });
        }
        $data['videos'] = $query->paginate(10);
        return view('dashboard', $data);
    }
}
