<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageIndustry extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'order',
        'title',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
