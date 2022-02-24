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
        $user = Article::find($request->article_id)->users()->where('user_id', $request->user()->id)->first();
        // dd($user);
        if ($request->user()->id === $userId) {
            return redirect('/articles/' . $request->article_id);
        }
        // $confirm = ArticleLike::where('user_id', $request->user()->id)->where('article_id', $request->article_id);
        // $confirm = $article->$user->isEmpty;
        // dd($confirm);
        dd($user->exists());
        if ($user->exists()) {
            $user->delete();
            return redirect('/articles/' . $request->article_id);
        }
        $article->users()->attach($request->user()->id);
        return redirect('/articles/' . $request->article_id);
    }
}
