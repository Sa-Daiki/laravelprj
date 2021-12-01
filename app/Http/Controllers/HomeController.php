<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo; //これでMemoモデル使えるようになった

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // // public function index()
    // // {
    // //     $user = \auth::user(); //ログインしているユーザー情報をViewに渡している
    // //     //投稿を取得
    // //     $posts = Memo::where('user_id', $user['id'])
    // //                             ->where('status', 1)
    // //                             ->orderBy('updated_at', 'DESC')
    // //                             ->take(5)  //上から5個表示させるようにしてる
    // //                             ->get(); //Memos tableからすべてのメモを持ってくるという指令
    // //                                         // dd('$posts'); //ddしても何も出てこない？？？？？？？？？
    // //                                         return view('home', compact('user', 'posts'));
    // // }

    // public function welcome() //メソッド名（なんでもいい）
    //  {
    //     $name = "daiki"; //これをデータベースからとってくるようにする（モデルの呼び出し
    //      return view('welcome', [
    //      'userName' => $name //welcomeに対してuserNameに$name入れてる
    //        ]);
    //   }

    //  public function home() //メソッド名（なんでもいい）
    // {
    //                                         return view('index', [
    //     ]);
    // }

    // public function new() //メソッド名（なんでもいい）
    // {
    //     $user = \auth::user(); //ログインしているユーザー情報をViewに渡している
    //     return view('drafts.new', compact('user'));//compactつかえば取ってきた値をViewで使えるようになる
    // }

    // public function edit($id) //メソッド名（なんでもいい）$idは変数routingの{}に対応
    // {
    //     //該当するIDのメモをデータベースから取得
    //     $user = \Auth::user();
    //     $post = Memo::where('status', 1)
    //                         ->where('id', $id)
    //                         ->where('user_id', $user['id'])
    //                         ->first();//条件に該当した行を1行だけ取ってくる
    //                         // dd($post);
    //     $posts = Memo::where('user_id', $user['id'])
    //                             ->where('status', 1)
    //                             ->orderBy('updated_at', 'DESC')
    //                             ->take(5)  //上から5個表示させるようにしてる
    //                             ->get(); //Memos tableからすべてのメモを持ってくるという指令
    //     //取得したメモをViewに渡す
    //     // $tags = Tag::where('user_id', $user['id'])->get();
    //     return view('drafts/edit', compact('user', 'post', 'posts'));
    // }

    // public function update(Request $request, $id)//$id使うことでパラメータの後ろの数字取れる
    // {
    //     $inputs = $request -> all();
    //     // dd($inputs);
    //     Memo::where('id', $id)
    //             ->update(['content' => $inputs['content'] ]);
    //     return redirect() -> route('home');
    // }
    // //request=ユーザーから送られてきたリクエストが入ってるもの allを使うと主にフォームで送られてきたものを全て取れる

    // public function delete(Request $request, $id)//$id使うことでパラメータの後ろの数字取れる
    // {
    //     $inputs = $request -> all();
    //     //論理削除なのでstatusを２に変えればいい
    //     Memo::where('id', $id)
    //             ->update([ 'status'=>2 ]);
    //     // Memo::where('id', $id)
    //     //         ->delete(); これは物理的に削除する方法
    //     return redirect() -> route('home');
    // }

    //

}
//リクエストファザードって何？
//なんで正しいユーザーidが返されてるのか
//  リクエストファザードの仕組みが分かっていない
