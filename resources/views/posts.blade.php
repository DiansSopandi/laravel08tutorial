@extends('layouts.main')

@section('content')
    @if($posts)
        @foreach ($posts as $post)
            <article class="mb-5 border-bottom pb-4">
                <h4><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a> </h4>
                {{-- <h6>{{ $post['author'] }}</h6> --}}
                {{-- <p>{{ $post['post'] }}</p> --}}
                <p>author: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> </p>
                <p>{{ $post->excerpt }}</p>
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
            </article>
        @endforeach
    @else
        <article> <p class="font-weight-bold"> no posts for author x </p> </article>
    @endif
@endsection