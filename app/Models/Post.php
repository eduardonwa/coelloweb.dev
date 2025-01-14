<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, HasTags, InteractsWithMedia;

    protected $fillable = [
        'title',
        'body',
        'caption',
        'thumbnail',
        'slug',
        'active',
        'meta_title',
        'published_at',
        'meta_description',
        'category_id',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        // Before deleting the post
        static::deleting(function ($post) {
            // Detach all associated tags
            $post->tags()->detach();
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function humanReadTime(): Attribute
    {
        return new Attribute(
            get: function($value, $attributes) {
                // get count of words from 'body' column without html tags (strip_tags)
                $words = Str::wordCount(strip_tags($attributes['body']));
                // 200 words = 1 minute,
                $minutes = ceil($words / 200);
                // return total minutes with its plural
                return $minutes. ' '.str('minuto')->plural($minutes);
            }
        );
    }

    public function getFormattedDate()
    {
        return $this->published_at->format('jS F Y');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('small')
            ->width(320)
            ->height(240)
            ->nonQueued();

        $this->addMediaConversion('medium')
            ->width(640)
            ->height(480)
            ->nonQueued();

        $this->addMediaConversion('large')
            ->width(1024)
            ->height(768)
            ->nonQueued();

        $this->addMediaConversion('extra-large')
            ->width(1920)
            ->height(1080)
            ->nonQueued();
    }
}
