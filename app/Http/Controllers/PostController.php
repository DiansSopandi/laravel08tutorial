<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        $search = request(['search', 'category', 'author']);
        $category = request('category');
        $author = request('author');

        if ($category) {
            $categoryData =  Category::firstWhere('slug', $category);
            $title = ' in ' . $categoryData->name;
        }

        if ($author) {
            $authorData =  User::firstWhere('username', $author);
            $title = ' by ' . $authorData->name;
        }
        // $posts = Post::latest();

        // this code below commented to replace with scope in model
        // if ($search) {
        //     $posts->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%');
        // }

        return view('posts', [
            'title' => 'All Posts' . $title,
            'active' => 'posts',
            // 'posts' => Post::all(),
            // 'posts' => Post::latest()->get(),
            // 'posts' => Post::with(['author', 'category'])->latest()->get(), // using "with" Eloquent to reduce N+1 problem with query Eloquent to use Eager loading
            // 'posts' => Post::latest()->get(), // using "with" Eloquent to reduce N+1 problem with query Eloquent to use Eager loading
            // 'posts' => $posts->get(), // using "with" Eloquent to reduce N+1 problem with query Eloquent to use Eager loading
            // 'posts' => Post::latest()->filter($search)->get(), // filter diambil dari scope yg ada di model {scopeFilter}
            'posts' => Post::latest()->filter($search)->paginate(4)->withQueryString(), //pagination otomatis sekaligus get dan membuat pagination
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
            'active' => 'posts',
            'post' => $post,
        ]);
    }
}
