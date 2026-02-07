<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class OrganizationMember extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'position',
        'email',
        'linkedin_url',
        'sort_order',
        'is_active',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('member_photo')->singleFile();
    }
}