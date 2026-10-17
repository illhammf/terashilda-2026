<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    protected $fillable = [
        'name',
        'tagline',
        'description',
        'story',
        'address',
        'phone',
        'whatsapp',
        'email',
        'logo',
        'hero_image',
        'instagram',
        'tiktok',
        'facebook',
        'opening_hours',
        'is_active',
    ];

    protected $casts = [
        'opening_hours' => 'array',
        'is_active' => 'boolean',
    ];

    public static function active(): ?self
    {
        return static::where('is_active', true)->first();
    }
}
