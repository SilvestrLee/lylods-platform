<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerOpportunity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'location', 'type', 'description', 'closing_date',
        'status', 'created_by', 'updated_by',
    ];

    protected $casts = [
        'closing_date' => 'date',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
