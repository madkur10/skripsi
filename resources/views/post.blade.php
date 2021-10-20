@extends('layouts.main')

@section('container')

<article>
    <h3>{{ $post['title'] }}</h3>
    <h5>By: {{ $post['author'] }}</h5>
    <p>{{ $post['body'] }}</p>
</article>

<a href="/blog">Back to Blog</a>

@endsection