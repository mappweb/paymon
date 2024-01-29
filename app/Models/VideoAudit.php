<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoAudit extends Model
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
        'video_id',
    ];

    /**
     * @return BelongsTo
     */
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
