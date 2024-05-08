<?php

use App\Http\Controllers\DashboardController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
        'title' => 'home',
        'active' => 'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'about',
        'active' => 'about',
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
        'title' => 'post categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "post by category: $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author'),
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "post by author: $author->name",
        'active' => 'posts',
        'posts' => $author->posts->load('category', 'author'), // to use lazy eager loading because this use route binding to reduce to much query by Eloquent
    ]);
});


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
//name route {and roure below has given name with login name route (->name('login'))}
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// two ruote below are return same result
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'title' => 'dashboard',
            'active' => 'dashboard',
        ]);
    });
});
