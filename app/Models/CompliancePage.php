<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompliancePage extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'content',
        'seo_title',
        'seo_description',
        'last_reviewed_at',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'last_reviewed_at' => 'date',
    ];
}
