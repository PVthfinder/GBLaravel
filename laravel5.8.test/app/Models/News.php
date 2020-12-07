<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    //$perPage = 5; количество элементов для пагинации

    protected $fillable = [
        'category_id',
        'image',
        'is_private',
        'title',
        'spoiler',
        'text'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Categories','category_id','id');
    }
}
