<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;


    public static function boot()
    {
         parent::boot();
        
         static::creating(function ($model) {
             $model->tag_id = Str::uuid();
         });
    }
}
