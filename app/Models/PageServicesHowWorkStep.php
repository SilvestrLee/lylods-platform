<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageServicesHowWorkStep extends Model
{
    use HasFactory;

    protected $table = 'page_services_how_we_work_steps';

    protected $fillable = [
        'page_id',
        'order',
        'title',
        'description',
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
