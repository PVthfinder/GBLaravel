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

    /*public static function rules() {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'image',
            'is_private' => 'min:0|max:1',
            'title' => 'required',
            'spoiler' => 'required',
            'text' => 'required'
        ];
    }*/
}
