<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Models\Article;
use App\Models\ArticleLike;
use App\Models\Comment;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request -> keyword;
        if(!empty($keyword)){
            $posts = Article::searchByKeyword($keyword);
        }
        $posts = Article::searchByKeyword($keyword)->orderByUpdated()->paginate(10);
        return view('posts.index', compact('posts'));
    }

     public function create()
    {
        $tags = Tag::get();
        return view('posts.create', compact('tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $tagId  = $request -> tags_id;
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);
        $article -> tags() -> sync([$tagId]);
        return redirect() -> route('posts.index');
    }

    public function show($id)
    {
        $article = Article::find($id);
        $userName = $article->user->name;
        $user = auth()->user();
        $count = ArticleLike::where('article_id', $id)->count();
         $comments = Comment::orderBy('updated_at', 'ASC')->where('article_id', $article->id)->get();
        $tags = $article->tags;
        return view('posts.show', compact('article', 'comments', 'userName', 'tags', 'count', 'user'));
    }

    public function edit($id)
    {
        $user = Auth()->user();
        $post = Article::find($id)
        ->where('status', 1)
        ->where('user_id', $user['id'])
        ->first();
        $posts = Article::where('user_id', $user['id'])
        ->where('status', 1)
        ->orderBy('updated_at', 'DESC')
        ->take(20)
        ->get();
        return view('posts.edit', compact('user', 'post', 'posts'));
    }

    public function update(PostStoreRequest $request, $id)
    {
        Article::find($id)->update([
        'title' => $request->title,
        'content' => $request->content
        ]);
        return redirect() -> route('posts.index');
    }

    public function destroy(Request $request, $id){
        $inputs = $request -> all();
        Article::where('id', $id)
        ->delete();
        return redirect() -> route('posts.index');
    }

};
