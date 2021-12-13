記事記事
<p>{{$article["content"]}}</p>
<form method='GET' action="/posts/{{$article['id'] }}">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article['id']}}">
    <textarea name="comment" rows="10" cols="50"></textarea>
    <input type="submit" name="submit" value="投稿">
</form>
