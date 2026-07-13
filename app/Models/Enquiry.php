<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    public const TYPES = [
        'business-consultancy',
        'technology-digital',
        'training',
        'recruitment',
        'compliance',
        'property-sourcing',
        'property-management',
        'property-development',
        'community-project',
        'partnership-investment',
        'other',
    ];

    protected $fillable = [
        'name',
        'email',
        'enquiry_type',
        'organisation',
        'message',
        'ip_address',
        'email_sent_at',
    ];

    protected function casts(): array
    {
        return [
            'email_sent_at' => 'datetime',
        ];
    }
}
