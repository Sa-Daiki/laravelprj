@foreach($posts as $post)
            <a href="/posts/{{ $post['id'] }}/edit">{{ $post['title'] }}</a>
@endforeach
