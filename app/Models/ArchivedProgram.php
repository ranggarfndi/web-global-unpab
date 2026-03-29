<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; //
use Spatie\MediaLibrary\HasMedia; //
use Spatie\MediaLibrary\InteractsWithMedia;

class ArchivedProgram extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'category', 'execution_date', 'summary', 'content', 'stats', 'testimonials', 'is_published'];
    
    // Field yang bisa diterjemahkan
    public $translatable = ['title', 'summary', 'content'];

    protected $casts = [
        'execution_date' => 'date',
        'stats' => 'array',
        'testimonials' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('archive_documentation'); //
    }
}