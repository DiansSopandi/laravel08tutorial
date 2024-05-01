<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'All Posts',
            // 'posts' => Post::all(),
            // 'posts' => Post::latest()->get(),
            // 'posts' => Post::with(['author', 'category'])->latest()->get(), // using "with" Eloquent to reduce N+1 problem with query Eloquent to use Eager loading
            'posts' => Post::latest()->get(), // using "with" Eloquent to reduce N+1 problem with query Eloquent to use Eager loading
        ]);
    }

    /**
     * 
     *public function show($slug)
     *{
     *    return view('post', [
     *        'title' => 'single post',
     *        'post' => Post::find($slug),
     *    ]);
     *}
     */

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'single post',
            'post' => $post,
        ]);
    }
}
