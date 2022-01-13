<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sku',
        'category_id',
        'quantity',
        'price',
        'discount_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_images')
            // ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(128)
            ->height(128)
            ->sharpen(10);
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
