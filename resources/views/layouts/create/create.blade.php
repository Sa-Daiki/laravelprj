@extends('layouts.layout')
@section('draft')
<input type='text' value="タイトル">
<input type='text' value="知識に関連するタグをスペース区切りで５つまで入力（例: Ruby Rails">
<p>作成画面</p>
<form method='POST' action="/drafts/store">
    @csrf{{--ユーザー乗っ取り対策--}}
    <input type="hidden" name="user_id"value="{{ $user['id']}}">{{-- $userの中の、idを取り出すという意味--}}
    <textarea name="content" rows="10" cols="50"></textarea>

    <select name="example1">
        <option value="下書き">下書き保存</option>
        <option value="限定">限定共有投稿</option>
        <option value="投稿">Qiitaに投稿</option>
    </select>

    <input type="submit"name="submit"value="送信する"/>
</form>
{{-- {{ $user['name'] }} --}}
@endsection

{{-- 画面から、content, user_id, statusを入れてあげることが大切 --}}

{{-- 選択したoptionごとに違うページに遷移するようにするにはどうすればいい？ --}}

