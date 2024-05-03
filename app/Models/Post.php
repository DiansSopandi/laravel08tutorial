<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body']; // just protect the certain field that is defined in the bracket
    protected $guarded = ['id']; // to protect only "id" and allow other properties to fill
    protected $with = ['category', 'author']; // setiap query ke post model akan diappy juga eager loading utk optimized query

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $category = $filters['category'] ?? false;
        $author = $filters['author'] ?? false;

        // these query below are same as the result but its different approach
        // if ($filter) {
        //     $query->where('title', 'like', '%' . $filter . '%')
        //         ->orWhere('body', 'like', '%' . $filter . '%');
        // }

        $query
            ->when($search, function ($query, $search) {
                return $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            })
            ->when($category, function ($query, $category) {
                return $query
                    ->whereHas('category', function ($query) use ($category) { // use digunakan untuk mendapatkan value dari $category closure diatasnya
                        return $query->where('slug', $category);
                    });
            })
            ->when($author, function ($query, $author) {
                return $query->whereHas('author', function ($query) use ($author) {
                    return $query->where('username', $author);
                });
            });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
