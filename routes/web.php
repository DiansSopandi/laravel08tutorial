<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('home', [
        'title' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'about',
        'fullname' => 'guardians asguard',
        'email' => 'guardians.asguard@gmail.com',
        'avatar' => 'pp.jpg',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

// Route::get('/posts/{slug}', [PostController::class, 'show']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post By Category: $category->name",
        'posts' => $category->posts->load('category', 'author'),
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Post by Author: $author->name",
        'posts' => $author->posts->load('category', 'author'), // to use lazy eager loading because this use route binding to reduce to much query by Eloquent
    ]);
});
