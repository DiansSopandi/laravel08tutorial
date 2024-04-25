@extends('layouts.main')

@section('content')
    <h2>{{ $post['title'] }}</h2>
    <h2>{{ $post['author'] }}</h2>
    <p>{{ $post['post'] }}</p>

    <a href="/posts">back to posts</a>
@endsection