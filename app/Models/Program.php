<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // Import Trait Translate
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia; // Import Trait Media

class Program extends Model
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'category',
        'target_audience',
        'title',
        'slug',
        'overview',
        'activities',
        'description',
        'is_active',
        'registration_deadline',
    ];

    // Beritahu Spatie kolom mana saja yang bisa diterjemahkan (ID/EN)
    public $translatable = [
        'title', 
        'description', 
        'overview', 
        'activities'
    ];

    // Agar tipe data JSON dibaca sebagai Array oleh Laravel
    protected $casts = [
        'is_active' => 'boolean',
        'registration_deadline' => 'date',
        'overview' => 'array',
        'activities' => 'array',
    ];
}
