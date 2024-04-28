@extends('layouts.main')

@section('content')

    <h1 class="mb-5"> Post Categories</h1>
    @foreach ($categories as $category)
        <ul>
            <li>
                <h4><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a> </h4>
            </li>
        </ul>
    @endforeach
@endsection