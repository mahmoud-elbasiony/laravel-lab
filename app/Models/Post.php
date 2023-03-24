<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        "title",
        "description",
        "user_id",
        "isDeleted"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected function humanReadableDate(): Attribute
    {
        return Attribute::make(
            get: fn () => date_format($this->created_at, 'l jS \of F Y h:i:s A'),
        );
    }
}
