<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleLike;

class ArticleLikeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Article::find($request->article_id)->user_id;
        if ($request->user()->id == $user) {
            return redirect('/articles/' . $request->article_id);
        } else {
            if (ArticleLike::where('user_id', $request->user()->id)->where('article_id', $request->article_id)->exists()) {
                ArticleLike::where('user_id', $request->user()->id)->where('article_id', $request->article_id)->delete();
            } else {
                ArticleLike::create([
                    'article_id' => $request->article_id,
                    'user_id' => $request->user()->id
                ]);
            }
            return redirect('/articles/' . $request->article_id);
        }
    }
}
