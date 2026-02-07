<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Program extends Model implements HasMedia 
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

    public $translatable = [
        'title', 
        'description', 
        'overview', 
        'activities'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'registration_deadline' => 'date',
        // 'overview' => 'array',
        // 'activities' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('program_gallery');
    }
}