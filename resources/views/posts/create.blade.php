<p>作成画面</p>
<form method='POST' action="/posts">  {{--データを入れるときはPostメソッドを使う--}}
    @csrf
    <textarea name="title" rows="10" cols="10"></textarea>
    <textarea name="content" rows="10" cols="50"></textarea>
    <input type="submit" name="submit" value="送信する">
</form>
