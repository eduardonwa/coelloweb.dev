<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected $casts = ['tags' => 'array',];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // Accessor to decode JSON name
    public function getNameAttribute($value)
    {
        return json_decode($value, true)['en'] ?? $value;
    }
}
