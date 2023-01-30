<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;





    
    protected $fillable = [
        'article_title',
        'article_text',
        'category',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
