<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'user_id',
        'status',
        'thumbnail',
        'views',
        'content',
        'tags',
    ];

    // relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relasi ke user (penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // auto slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });

        static::updating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }
}
