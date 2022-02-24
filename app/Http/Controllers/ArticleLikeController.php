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
        $article = Article::find($request->article_id);
        $userId = Article::find($request->article_id)->user_id;
        $user = Article::find($request->article_id)->users()->where('users.id', $request->user()->id);
        if ($request->user()->id === $userId) {
            return redirect('/articles/' . $request->article_id);
        }
        if ($user->exists()) {
            $user->detach();
            return redirect('/articles/' . $request->article_id);
        }
        $article->users()->attach($request->user()->id);
        return redirect('/articles/' . $request->article_id);
    }
}
