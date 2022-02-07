記事
<p>{{$userName}}</p>
<p>タイトル：{{$article["title"]}}</p>
<p>内容：{{$article["content"]}}</p>

@foreach($tags as $tag)
<a href="/tags/{{ $tag['id'] }}">タグ：{{$tag["title"]}}</a>
@endforeach
<form method='POST' action="/comments">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article['id']}}">
    <textarea name="comment" rows="3" cols="50"></textarea>
    <input type="submit" name="submit" value="投稿">
</form>
<form method='POST' action="/article_likes">
    @csrf
    <input type='hidden' name='article_id' value="{{ $article['id']}}">
    <button type='submit'>LGTM</button>
    <p>いいね数：{{$count}}</p>
</form>
    @foreach($comments as $comment)
    <p>{{ $comment["comment"] }}</p>

    <form method='POST' action="/comments/{{$comment['id']}}">
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
    <form method='POST' action="/comments/{{$comment['id']}}">
        @csrf
        @method('delete')
        @if ($comment['user_id'] === $user['id'])
        <button type='submit'>削除</button>
        @endif
    </form>
    @endforeach
    <a href="/posts">ホームへ</a>

