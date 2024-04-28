<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        static $password = '123456';
        static $excerpt = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente laborum corporis a laboriosam, nihil rerum!';
        static $body = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id magni tenetur libero recusandae, dignissimos earum assumenda, ducimus, obcaecati quo eius facilis soluta exercitationem perspiciatis quod? Ex velit, debitis mollitia quam sint possimus perspiciatis laboriosam doloremque laudantium ipsam minima, deserunt dicta dolores. Aliquam sit a rem debitis optio officiis numquam eius.';

        User::factory(3)->create();

        // User::create([
        //     'name' => 'guardians',
        //     'email' => 'guardians@gmail.com',
        //     'password' => bcrypt($password),
        // ]);
        // User::create([
        //     'name' => 'asguard',
        //     'email' => 'asguard@gmail.com',
        //     'password' => bcrypt($password),
        // ]);
        // User::create([
        //     'name' => 'guardians asguard',
        //     'email' => 'guardians.asguard@gmail.com',
        //     'password' => bcrypt($password),
        // ]);        

        Post::factory(20)->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => $excerpt,
        //     'body' => $body,
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => $excerpt,
        //     'body' => $body,
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => $excerpt,
        //     'body' => $body,
        //     'category_id' => 1,
        //     'user_id' => 3,
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
    }
}
