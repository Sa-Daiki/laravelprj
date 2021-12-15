@extends('layouts.layout')

@section('home')
<div onclick="obj=document.getElementById('open').style; obj.display=(obj.display=='none')?'block':'none';">
<a href="/posts/create">投稿</a>
<a href="/article_edits">編集</a>
<p>ホーム</p>
@foreach($posts as $post)
            <a href="/posts/{{ $post['id'] }}">{{ $post['title'] }}</a> {{--/postsのページに投稿一覧を出してる--}}
@endforeach
@endsection
