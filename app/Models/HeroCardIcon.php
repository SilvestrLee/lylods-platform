<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroCardIcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_card_id',
        'order',
        'icon',
        'label',
        'tag',
    ];

    public function heroCard(): BelongsTo
    {
        return $this->belongsTo(HeroCard::class);
    }
}
