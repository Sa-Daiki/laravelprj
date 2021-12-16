記事記事
<p>{{$userName}}</p>
<p>タイトル：{{$article["title"]}}</p>
<p>{{$article["content"]}}</p>
<form method='POST' action="/comments">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article['id']}}">
    <textarea name="comment" rows="3" cols="50"></textarea>
    <input type="submit" name="submit" value="投稿">
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
