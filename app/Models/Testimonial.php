<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'quote',
        'client_name',
        'role',
        'organisation',
        'company_logo_media_id',
        'photo_media_id',
        'featured',
        'display_order',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'featured'      => 'boolean',
        'is_active'     => 'boolean',
        'display_order' => 'integer',
    ];

    public function companyLogo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'company_logo_media_id');
    }

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'photo_media_id');
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
