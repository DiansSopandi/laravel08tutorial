@extends('layouts.main')

@section('content')
    <h1 class="mb-5 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            {{-- <form action="" method="get"></form>  jika methodnya get maka tidak perlu dituliskan gpp, karena method get adalah defaultnya tag form --}}
            <form action="/posts">
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}"/>
                @endif
                @if(request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}"/>
                @endif
                <div class="input-group mb-3 ">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>

    @if($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x300?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a> </h3>
            <p>
                <small> By.
                        <a href="/posts?author={{$posts[0]->author->username }}" class="text-decoration-none"> {{$posts[0]->author->username }}</a>
                        in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none mx-3">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">read more</a>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                @foreach($posts->skip(1) as $post)
                    <div class="col-md-4">
                        <div class="card" >
                            <p class="position-absolute px-2 py-1 " style="background-color: rgba(0, 0, 0, 0.7)"> 
                                <a href="/posts?category={{ $post->category->slug }} " class="text-decoration-none text-white">
                                    {{ $post->category->name }}
                                </a>
                            </p>
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            <div class="card-body">
                            <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                            <p>
                                <small> By.
                                        <a href="/posts?author={{$post->author->username }}" class="text-decoration-none mx-3"> {{$post->author->username }}</a>{{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none btn btn-primary">read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
             <p class="text-center fs-4 "> no post found  </p> 
    @endif
    <div class="d-flex justify-content-end mt-3">
        {{ $posts->links() }} 
         {{-- pagination could be show if the data more than arranged in paginate(number) in controller --}}
    </div>
@endsection