@extends('layouts.main')

@section('content')
    <h2 class="mb-5">{{ $post->title }}</h2>
    {{-- <h2>{{ $post['author'] }}</h2> --}}
    <p>author: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> </p>
    {{-- <p>{{ $post['post'] }}</p> --}}
    <p>{!! $post->body !!}</p>
    {{-- In Laravel's Blade templating engine, {!! !!} is used to output unescaped data, meaning that any HTML markup within the variable will be rendered as HTML and not escaped.

    So, <p>{!! $post->body !!}</p> would output the value of $post->body without escaping any HTML tags it might contain. This is useful when you want to render HTML content stored in your database or variables --}}

    <a href="/posts" class="text-decoration-none">back to posts</a>
@endsection