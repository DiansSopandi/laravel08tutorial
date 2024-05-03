@extends('layouts.main')

@section('content')

    <h1 class="mb-5">  {{ $title }}</h1>

    <div class="container">
        <div class="row ">
            @foreach ($categories as $category)
                        {{-- <h4><a href="/categories/{{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a> </h4> --}}
                        <div class="col-md-4">
                            <a href="/posts?category={{ $category->slug }}">
                                <div class="card bg-dark text-white">
                                    <img src="https://source.unsplash.com/1200x800?{{ $category->name }}" class="card-img" alt="...">
                                    <div class="card-img-overlay d-flex align-items-center p-0">
                                      <h5 class="card-title text-center flex-fill p-4 fs-2" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
            @endforeach
        </div>
    </div>
@endsection