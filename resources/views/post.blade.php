@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>

                <p>by.   <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category=/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> </p>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">

                <article class="my-3 fs-6">
                    <p>{!! $post->body !!}</p>
                </article>
                {{-- In Laravel's Blade templating engine, {!! !!} is used to output unescaped data, meaning that any HTML markup within the variable will be rendered as HTML and not escaped.
            
                So, <p>{!! $post->body !!}</p> would output the value of $post->body without escaping any HTML tags it might contain. This is useful when you want to render HTML content stored in your database or variables --}}
            
                <a href="/posts" class="text-decoration-none">back to posts</a>
            </div>
        </div>
    </div>
@endsection