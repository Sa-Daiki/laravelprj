@extends('layouts.layout')
@section('content')
    <div class="mainarticle">
        <a href="#">{{ $userName }}</a>
        <p>投稿日</p>
        <p> 更新日</p>
        <p class="articletitle">{{ $article['title'] }}</p>
        @foreach ($tags as $tag)
            <p>タグ:<a href="/tags/{{ $tag['id'] }}">{{ $tag['title'] }}</a></p>
        @endforeach
        <p class="articlec">{{ $article['content'] }}</p>

    </div>
    <form method='POST' action="/comments" class="postcomment">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article['id']}}" class="hidden">
        <textarea name="comment" rows="3" cols="50" class="commentform"></textarea>
        <input type="submit" name="submit" value="投稿">
    </form>
    <form method='POST' action="/article_likes">
        @csrf
        <button type='submit' class="LGTM" name="article_id" value="{{ $article['id'] }}">LG<br>TM</button>
        <p>{{ $count }}</p>
    </form>
    @foreach ($comments as $comment)
        <p>{{ $comment['comment'] }}</p>

        <form method='POST' action="/comments/{{ $comment['id'] }}">
            @csrf
            @method('put')
            @if ($comment['user_id'] === $user['id'])
                <input type='hidden' name='user_id' value="{{ $article['id'] }}">
                <textarea name='comment'>
                            {{ $comment['comment'] }}
                        </textarea>
                <button type='submit'>更新</button>
            @endif
        </form>

        </form>
        <form method='POST' action="/comments/{{ $comment['id'] }}">
            @csrf
            @method('delete')
            @if ($comment['user_id'] === $user['id'])
                <button type='submit'>削除</button>
            @endif
        </form>
    @endforeach
@endsection

<style type="text/css">
    .LGTM {
        border-radius: 50%;
        height: 40px;
        width: 40px;
        font-size: 13px;
        font-weight: 900;
        background: thite;
        color: #55c500;
        border-style: solid;
        border-width: 2px;
        border-color: #55c500;
        line-height: 11px;
    }

    .mainarticle {
        display: block;
        margin: 10px auto;
        background: #ffffff;
        height: auto;
        width: 1000px;
        padding: 10px 20px;
    }

    .articletitle {
        font-weight: 900;
        font-size: 40px;
    }

    .postcomment {
        width: 500px;
        display: block;
        margin: 0 auto;
        /* padding:20px 15px 20px 20px; */
        background: white;
    }

    .commentform {
        width:100px .hidden {
            margin: 0;
        }

</style>
