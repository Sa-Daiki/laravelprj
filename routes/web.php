<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
//記事に飛ぶようにする
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/' , [App\Http\Controllers\PostController::class, 'home'])->name('home');
Route::get('/posts/mypost' , [App\Http\Controllers\PostController::class, 'mypost'])->name('mypost');
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);

//get=ウェブのブラウザからアクセスしに行く //post＝データを投げる
// Route::get('/welcome' , [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
// Route::get('/drafts/new', [App\Http\Controllers\HomeController::class, 'new'])->name('new');
// Route::post('/drafts/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
// ///drafts/storeにpostされたとき、HomeControllerのストアメソッドに行くというような指示
// //Viewのメソッドに合わせてここではpost
// Route::get('/drafts/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
// //Controllerの関数の引数に対応してる
// Route::post('/drafts/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
// //更新＝データを送る　なのでpostメソッド使う
// Route::post('/drafts/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
// //削除の考え方はアップデートとほぼ同じ

// // Route::get('/' , [PostController::class, 'welcome']);
// //PostControllerの中にmethod
// //どのmethodを呼ぶのかも書いておく
// //routingはurl決めるところ

//view　ホール
//Controller　ホールとキッチンをつなぐ人
//Model　キッチン
//データーベース　キッチンにある食材
//

//送信する＝注文みたいなもの
//リレーショナルデータベース　テーブル（左の部分）同士が何かしらの関連性を持ってる（紐づけていっている）
//一つのテーブルに全部入れると、、、無駄が起こる（一回一回書くことを避ける）
//概念ごとにテーブル分けていく　それごとにモデルがある

//ページ押したら記事に飛ぶようにする
//crud(create作成 read閲覧 update更新 delete削除)の動作は基本中の基本の動作（投稿型のウェブ）をかけるようになる
//rudを作る
//resource = ルーティングの書き方　crudに必要なルーティング（url）が全部自動で生成される
//crud　実現するためには7個くらいのアクションが必要



