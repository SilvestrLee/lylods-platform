<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageWhyChooseUsCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'order',
        'icon',
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
