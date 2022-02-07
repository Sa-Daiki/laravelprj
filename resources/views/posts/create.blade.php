@auth
<p>作成画面</p>
<form method='POST' action="/posts">
    <select name='tags_id'>
        @foreach($tags as $tag)
                <option value = "{{ $tag['id'] }}">{{ $tag['title'] }}</option>
        @endforeach
    </select>
    @csrf
    <textarea name="title" rows="10" cols="10"></textarea>
    <textarea name="content" rows="10" cols="50"></textarea>
    <input type="submit" name="submit" value="送信する">
</form>
<a href="/posts">ホームへ</a>
@endauth

@guest
<h1>ログインが必要です</h1>
<a href="/login">ログイン</a>
<a href="/register">会員登録</a>
@endguest
