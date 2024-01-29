<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Video extends Model
{
    use HasFactory;
    use HasUuids;
    use AuditableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'url',
    ];

    /**
     * @return HasMany
     */
    public function audit(): HasMany
    {
        return $this->hasMany(VideoAudit::class, 'video_id');
    }

    /**
     * @return int
     */
    public function numberOfViews(): int
    {
        $user = Auth::user();
        if(is_null($user)){
            return 0;
        }
        if($user->hasRole('admin')){
            return  $this->audit()
                ->count();
        }
        return  $this->audit()
            ->where('created_by', '=', $user->id)
            ->count();
    }
}
