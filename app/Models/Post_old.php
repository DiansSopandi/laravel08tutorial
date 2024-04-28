<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
class Post_old
{
    // use HasFactory;
    private static $blogPosts = [
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

    public static function all()
    {
        return collect(self::$blogPosts); // function collection untuk membuat array yg bisa diakses dg method eloquent
    }

    public static function find($slug)
    {
        // deklarasi dibawah ini utk statis
        // $posts = self::$blogPosts; // self untuk properties static , tetapi static untuk method static dalam sebuah class
        // $selectedPost = [];
        // foreach ($posts as $post) {
        //     if ($post['slug'] === $slug) {
        //         $selectedPost = $post;
        //     }
        // }
        // return $selectedPost;

        // deklarasi berikut menggunakan database dg Eloquent ORM
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
