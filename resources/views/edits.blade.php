@foreach($article as $article)
            <a href="/posts/{{ $article['id'] }}/edit">{{ $article['title'] }}</a>
@endforeach
<a href="/posts">ホームへ</a>
