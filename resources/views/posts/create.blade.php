<p>作成画面</p>
<form method='POST' action="/posts">  {{--データを入れるときはPostメソッドを使う--}}
    @csrf
    <input type="hidden" name="user_id" value="{{ $user['id']}}">    {{--$userの中の、idを取り出すという意味 --}}
    <textarea name="content" rows="10" cols="50"></textarea>
    <input type="submit" name="submit" value="送信する">
</form>
