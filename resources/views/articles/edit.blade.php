<p>編集画面</p>
<form method='POST' action="/articles/{{$article['id']}}">
    @csrf
    @method('put')
    <textarea name='title'>
        {{ $article['title'] }}
    </textarea>
    <textarea name='content'>
        {{ $article['content'] }}
    </textarea>
    <button type='submit'>更新</button>
</form>
<form method='article' action="/articles/{{$article['id']}}">
    @csrf
    @method('delete')
    <button type='submit'>削除</button>
</form>
<a href="/articles">ホームへ</a>
