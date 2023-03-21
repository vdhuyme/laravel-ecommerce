<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'articleTitle',
        'articleSlug',
        'articleContent',
        'articleImage',
        'shortContent',
        'metaDescription',
        'metaKey',
        'metaTitle',
        'userId',
        'featuredArticle',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
