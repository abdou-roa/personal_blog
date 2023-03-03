<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;





    
    protected $fillable = [
        'article_title',
        'article_text',
        'category',
        'article_image',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public static function boot()
    {
         parent::boot();
        
         static::creating(function ($model) {
             $model->article_id = Str::uuid();
         });
    }

    protected $primaryKey = 'article_id';
    protected $keyType = 'string';
}
