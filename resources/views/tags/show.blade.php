
記事
@foreach($articles as $article)
<a href="/posts/{{ $article['id'] }}">{{$article['title']}}</a>
@endforeach
