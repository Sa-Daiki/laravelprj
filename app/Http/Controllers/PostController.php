<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class PostController extends Controller
{
    // public function home() //メソッド名（なんでもいい）
    // {
    //     return view('posts/home', []);
    // }

    public function mypost()
    {
        $user = \Auth::user();
        // dd($user);
        if($user != null){
         $posts = Article:: where('user_id', $user['id'])
                                ->where('status', 1)
                                ->orderBy('updated_at', 'ASC')
                                ->get(); //Memos tableからすべてのメモを持ってくるという指令
            return view('/posts/mypost', compact('user', 'posts'));
     }
        else{
                return view('/posts');
        }
    }

    public function index()
    {
        $user = \Auth::user(); //ログインしているユーザー情報//ログインしてない場合はnullが返る、ログインしていない場合も書いておく
        // dd($user);
        //投稿を取得
        if($user != null){
            $posts = Article::orderBy('updated_at', 'ASC')
                                ->take(20)  //上から5個表示させるようにしてる
                                ->get(); //Memos tableからすべてのメモを持ってくるという指令
            return view('/posts', compact('user', 'posts'));
        }
        else{
            return view('posts/home');
        }
    }

// $fruits = ["apple"=>"りんご","ぶどう","みかん"] //りんごが０キーふられてる　//[]のじてんでarray
// $fruits[1] //ぶどうを取り出せてる（arrayの中のキーを指定することでValueが取り出せてる）
//キーは自分で決めることもできる



     public function create()
    {
        $user = \Auth::user(); //ログインしているユーザー情報をViewに渡している
        return view('/posts/create', compact('user'));
    }

    public function store(Request $request) //Requestはフォームに入力された値を受け取れる
    {
            $data = $request -> all(); //送信、受信されたデータをすべて取る
            // dd($data);//デバック関数
            // dd($request->user()->id);
            $memo_id = Article::create([
                'title'=>'title', 'content' => $data['content'], 'user_id' => $data['user_id']
            ]);
            // 'content',''user_id,'status'は全部カラム名に一致している！！！！！！
            return redirect() -> route('posts.index');
    }

    public function show($id)
    {
        $user = \Auth::user();
        if($user != null){
        $article = Article::where('id', $id)
                                      ->first();
                                    //   dd($article);
        return view('posts/show', compact('user', 'article'));}
        else{
            return view('/posts');
        }
    }

    public function edit($id) //$idは変数routingの{}に対応
    {
        //該当するIDのメモをデータベースから取得
        $user = \Auth::user();
        $post = Article::where('status', 1)
                            ->where('id', $id)
                            ->where('user_id', $user['id'])
                            ->first();//条件に該当した行を1行だけ取ってくる
                            // dd($post);
        $posts = Article::where('user_id', $user['id'])
                                ->where('status', 1)
                                ->orderBy('updated_at', 'DESC')
                                ->take(20)  //上から5個表示させるようにしてる
                                ->get(); //Memos tableからすべてのメモを持ってくるという指令
        //取得したメモをViewに渡す
        // $tags = Tag::where('user_id', $user['id'])->get();
        return view('/posts/edit', compact('user', 'post', 'posts'));
    // posts.blade.phpでは全ての投稿が見れて、そこから詳細ページ(show.blade.php)に飛ぶようにする
    // posts.blade.phpでは全ての投稿が見れて、そこから詳細ページ(show.blade.php)に飛ぶようにする
    }

    public function update(Request $request, $id)//$id使うことでパラメータの後ろの数字取れる
    {
        $inputs = $request -> all();
        Article::where('id', $id)
                ->update(['content' => $inputs['content'] ]);
        return redirect() -> route('posts.index');
    }

    public function destroy(Request $request, $id)//$id使うことでパラメータの後ろの数字取れる
    {
        // dd("あ");
        $inputs = $request -> all();
        Article::where('id', $id)
                ->delete(); //これは物理的に削除する方法、論理削除はなるべくしない
        return redirect() -> route('posts.index');
    }

};

// viewに送ってないから映らない

//posts/storeじゃなくて/storeにとぶようにすればよき

// showとindexの違い調べる
// 逆かもしれない
//ログインしている場合としてない場合の条件文書いておく
