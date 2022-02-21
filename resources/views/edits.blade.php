@foreach($article as $article)
            <a href="/articles/{{ $article['id'] }}/edit">{{ $article['title'] }}</a>
@endforeach
<a href="/articles">ホームへ</a>
