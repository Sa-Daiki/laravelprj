記事記事
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
        <input type='hidden' name='user_id' value="{{ $article['id'] }}">
        <textarea name='comment'>
            {{ $comment['comment'] }}
        </textarea>
        <button type='submit'>更新</button>
    </form>

    </form>
    <form method='POST' action="/comments/{{$comment['id']}}">
        @csrf
        @method('delete')
        <button type='submit'>削除</button>
    </form>

    @endforeach
