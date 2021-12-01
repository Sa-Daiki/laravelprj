@extends('layouts.layout')

@section('home')
{{-- ↓ここにログインした時のページ書いておけばいい --}}
<!-- 折り畳み展開ポインタ -->
<div onclick="obj=document.getElementById('open').style; obj.display=(obj.display=='none')?'block':'none';">
<a href="/posts/create">投稿</a>
<a href="/posts/mypost">編集</a>
<p>ホーム</p>
@foreach($posts as $post)
            <a href="/posts/{{ $post['id'] }}">{{ $post['content'] }}</a> {{--/postsのページに投稿一覧を出してる--}}
@endforeach

@endsection
