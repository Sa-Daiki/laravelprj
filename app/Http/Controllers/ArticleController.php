<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\ArticleLike;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if (!empty($keyword)) {
            $articles = Article::searchByKeyword($keyword);
        }

        $articles = Article::with('user', 'tags')->searchByKeyword($keyword)->orderByUpdated()->paginate(15);
        $articles->map(function ($article) {
            $article['count'] = ArticleLike::where('article_id', $article->id)->count();
            return  $article;
        });
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $tags = Tag::get();
        return view('articles.create', compact('tags'));
    }

    public function store(ArticleStoreRequest $request)
    {
        $tagId  = $request->tags_id;
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);
        $article->tags()->sync([$tagId]);
        return redirect()->route('articles.index')->with('message', '投稿を作成しました');
    }

    public function show($id)
    {
        $article = Article::find($id);
        $userName = $article->user->name;
        $user = auth()->user();
        $count = ArticleLike::where('article_id', $id)->count();
        $comments = Comment::orderBy('updated_at', 'ASC')->where('article_id', $article->id)->get();
        $tags = $article->tags;
        return view('articles.show', compact('article', 'comments', 'userName', 'tags', 'count', 'user'));
    }

    public function edit($id)
    {
        $user = Auth()->user();
        $article = Article::find($id)
            ->where('status', 1)
            ->where('user_id', $user['id'])
            ->first();
        $articles = Article::where('user_id', $user['id'])
            ->where('status', 1)
            ->orderBy('updated_at', 'DESC')
            ->take(20)
            ->get();
        return view('articles.edit', compact('user', 'article', 'articles'));
    }

    public function update(ArticleStoreRequest $request, $id)
    {
        Article::find($id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect()->route('articles.index');
    }

    public function destroy(Request $request, $id)
    {
        $inputs = $request->all();
        Article::where('id', $id)
            ->delete();
        return redirect()->route('articles.index');
    }
};
