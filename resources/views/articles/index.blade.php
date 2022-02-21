@extends('layouts.layout')
@section('content')
    <div class="main">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @foreach ($articles as $article)
            <div class="articles">
                <p class=articleuser><a href="#">{{ $article->user->name }}</a>が{{ $article->updated_at }}に投稿</p>
                <a href="/articles/{{ $article['id'] }}" class=articletitle>{{ $article['title'] }}</a>
                @foreach ($article->tags as $tag)
                    <a href="/tags/{{ $tag->id }}" class="articletag">{{ $tag->title }}</a>
                @endforeach
                <P class="articleLGTM">LGTM:{{ $article->count }}</P>
            </div>
        @endforeach
    @endsection

    <style type="text/css">
        .articles {
            background: white;
            margin: 10px auto;
            padding: 15px;
            height: 120px;
            width: 1000px;
            display: grid;
            grid-template-rows: 20px 30px 20px 30px;
        }

        .articletitle {
            color: black;
            font-size: 20px;
        }

    </style>
