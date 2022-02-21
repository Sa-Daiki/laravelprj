<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'content', 'status', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
        return $this->belongsToMany(User::class, ArticleLikes::class);
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
