<?php

namespace App\Models;       //名前空間がついていることに注意

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// デフォルトをPostにしたら、Postsテーブルに紐づけてくれるようになっている(Post->Posts)
//→デフォルトのままの場合、Postテーブルがないといけない
class Post extends Model
{
    use HasFactory;

    protected $fillable=[

    ];
}

//テーブルは複数形、モデルは単数形で命名
