<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'posts',
            // 'posts' => Post::all(),
            'posts' => Post::latest()->get(),
        ]);
    }

    // public function show($slug)
    // {
    //     return view('post', [
    //         'title' => 'single post',
    //         'post' => Post::find($slug),
    //     ]);
    // }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'single post',
            'post' => $post,
        ]);
    }
}
