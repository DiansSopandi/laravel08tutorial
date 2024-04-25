<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function() {
    return view('home', [
        'title' => 'home'
    ]);
});

Route::get('/about', function() { 
    return view('about',[
        'title' => 'about',
        'fullname' => 'guardians asguard',
        'email' => 'guardians.asguard@gmail.com',
        'avatar' => 'pp.jpg',
    ]);
});

Route::get('/posts', function() {
    $blogPost = [
        [
            'title' => 'first title ',
            'slug' => 'first-title',
            'author' => 'first author',
            'post' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur, nesciunt tempora. Dolore asperiores provident, omnis magnam non a! Eum, possimus soluta. Voluptatem minus, iusto reiciendis asperiores eius quibusdam iste tempora molestiae? Libero in corporis, dolorum explicabo repellat, unde minus fugit molestias quis distinctio odio accusantium deserunt. Vero ratione nemo aliquam.'
        ],
        [
            'title' => 'second title',
            'slug' => 'second-title',
            'author' => 'second author',
            'post' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea unde architecto reiciendis et esse perspiciatis nemo voluptatibus. Doloremque cum, dolores numquam, temporibus expedita aspernatur itaque officia beatae ipsa eum nam. In harum laboriosam laudantium repellendus maiores quia odio ipsa adipisci, veniam, quam, blanditiis sunt officiis eum? Iste quis fuga maxime at, distinctio aspernatur repudiandae nesciunt minus tempore harum incidunt deleniti alias impedit, nulla, cumque provident facere? Asperiores sed laudantium ducimus ratione rem ad minima suscipit atque, itaque sit incidunt quidem nobis culpa eius possimus cupiditate! Mollitia nulla ullam ipsum asperiores voluptate tempore praesentium, unde neque? Quibusdam officiis obcaecati alias rem.'
        ]
    ];
    
    return view('posts', [
        'title' => 'posts',
        'posts' => $blogPost,
    ]);
});

Route::get('/posts/{slug}', function($slug) {
    $blogPost = [
        [
            'title' => 'first title ',
            'slug' => 'first-title',
            'author' => 'first author',
            'post' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur, nesciunt tempora. Dolore asperiores provident, omnis magnam non a! Eum, possimus soluta. Voluptatem minus, iusto reiciendis asperiores eius quibusdam iste tempora molestiae? Libero in corporis, dolorum explicabo repellat, unde minus fugit molestias quis distinctio odio accusantium deserunt. Vero ratione nemo aliquam.'
        ],
        [
            'title' => 'second title',
            'slug' => 'second-title',
            'author' => 'second author',
            'post' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea unde architecto reiciendis et esse perspiciatis nemo voluptatibus. Doloremque cum, dolores numquam, temporibus expedita aspernatur itaque officia beatae ipsa eum nam. In harum laboriosam laudantium repellendus maiores quia odio ipsa adipisci, veniam, quam, blanditiis sunt officiis eum? Iste quis fuga maxime at, distinctio aspernatur repudiandae nesciunt minus tempore harum incidunt deleniti alias impedit, nulla, cumque provident facere? Asperiores sed laudantium ducimus ratione rem ad minima suscipit atque, itaque sit incidunt quidem nobis culpa eius possimus cupiditate! Mollitia nulla ullam ipsum asperiores voluptate tempore praesentium, unde neque? Quibusdam officiis obcaecati alias rem.'
        ]
    ];
    
    $selectedPost = [];
    foreach ($blogPost as $post) {
        if($post['slug'] === $slug) {
            $selectedPost = $post;
        }
    }
    return view('post', [
        'title' => 'single post',
        'post' => $selectedPost,
    ]);
});