@extends('layouts.layout')
@section('tagcontent')
@foreach($articles as $article)
<a href="/articles/{{ $article['id'] }}">{{$article['title']}}</a>
@endforeach
@endsection
