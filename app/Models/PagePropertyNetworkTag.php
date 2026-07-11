<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PagePropertyNetworkTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'order',
        'label',
        'visibility',
    ];

    protected $casts = [
        'visibility' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
