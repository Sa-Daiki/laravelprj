<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleLike;
use App\Models\ArticleTags;
use App\Models\User;
use App\Models\Tag;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'content', 'status', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, ArticleLike::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, ArticleTags::class);
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        return $query->where('title', 'like', $keyword . '%')->orWhere('content', 'like', $keyword . '%');
    }

    public function scopeOrderByUpdated($query, $order = 'desc')
    {
        return $query->orderBy('updated_at', $order);
    }
}
