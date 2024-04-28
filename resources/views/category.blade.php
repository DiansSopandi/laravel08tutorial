@extends('layouts.main')

@section('content')

    <h1 class="mb-5"> Post Category: {{ $category }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h4><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a> </h4>
            {{-- <h6>{{ $post['author'] }}</h6> --}}
            {{-- <p>{{ $post['post'] }}</p> --}}
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection