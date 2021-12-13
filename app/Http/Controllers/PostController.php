<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        if($user != null){
            $posts = Article::orderBy('updated_at', 'ASC')
            ->take(20)
            ->get();
            return view('/posts', compact('user', 'posts'));
        }
        else{
            return view('posts/home');
        }
    }

     public function create()
    {
        $user = \Auth::user();
        return view('/posts/create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request -> all();
        $article_id = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id
        ]);
        return redirect() -> route('posts.index');
    }

    public function show(int $id)
    {
        $user = \Auth::user();
        if($user != null){
        $article = Article::where('id', $id)->first();
        $comments = Comment::orderBy('updated_at', 'ASC')
        ->take(20)
        ->get();
        return view('posts/show', compact('user', 'article', 'comments'));}
        else{
            return view('/posts');
        }
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $post = Article::where('status', 1)
        ->where('id', $id)
        ->where('user_id', $user['id'])
        ->first();
        $posts = Article::where('user_id', $user['id'])
        ->where('status', 1)
        ->orderBy('updated_at', 'DESC')
        ->take(20)
        ->get();
        return view('/posts/edit', compact('user', 'post', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request -> all();
        Article::where('id', $id)
        ->update(['content' => $inputs['content'] ]);
        return redirect() -> route('posts.index');
    }

    public function destroy(Request $request, $id){
        $inputs = $request -> all();
        Article::where('id', $id)
        ->delete();
        return redirect() -> route('posts.index');
    }

};
