@extends('layouts.main')

@section('content')
    @foreach ($posts as $post)
        <article class="mb-5"> 
            <h4><a href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a> </h4>
            <h6>{{ $post['author'] }}</h6>
            <p>{{ $post['post'] }}</p>    
        </article> 
    @endforeach
@endsection