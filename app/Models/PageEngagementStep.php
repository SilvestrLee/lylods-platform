<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageEngagementStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'order',
        'title',
        'description',
        'is_dark',
    ];

    protected $casts = [
        'is_dark' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
