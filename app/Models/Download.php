<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Download extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'media_id',
        'version',
        'category',
        'published_date',
        'is_public',
        'display_order',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_public'      => 'boolean',
        'published_date' => 'date',
    ];

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
