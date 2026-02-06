<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Partner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'website_url', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Opsional: Daftarkan koleksi agar logo otomatis di-crop jika perlu
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('partner_logo')
            ->singleFile(); // Satu partner cuma boleh punya 1 logo
    }
}