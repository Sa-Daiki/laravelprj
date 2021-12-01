<p>編集画面</p>
<form method='POST' action="/posts/{{$post['id']}}">
    @csrf
    @method('put')
    <input type='hidden' name='user_id' value="{{ $user['id'] }}">
    <textarea name='content'>
        {{ $post['content'] }}
    </textarea>
    <button type='submit'>更新</button>
</form>
{{-- {{dd($post)}} --}}
<form method='POST' action="/posts/{{$post['id']}}">
    @csrf
    @method('delete')
    <button type='submit'>削除</button>
    {{-- @extends('layouts.layout') --}}
</form>

{{-- フォームで投げるためには名前を付ける必要がある
問題点を明確にする　英語で調べれば出てくることが多い --}}
