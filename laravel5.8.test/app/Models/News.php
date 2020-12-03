<?php

namespace App\Models;

use Storage;

class News
{
    /*private const NEWS = [
        [
            'id' => 1,
            'category_id' => 1,
            'title' => 'Первая новость',
            'text' => 'Описание первой новости политики'
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Вторая новость',
            'text' => 'Описание второй новости политики'
        ],
        [
            'id' => 3,
            'category_id' => 1,
            'title' => 'Третья новость',
            'text' => 'Описание третьей новости политики'
        ],
        [
            'id' => 4,
            'category_id' => 1,
            'title' => 'Четвертая новость',
            'text' => 'Описание четвертой новости политики'
        ],
        [
            'id' => 5,
            'category_id' => 2,
            'title' => 'Первая новость',
            'text' => 'Описание первой новости экономики'
        ],
        [
            'id' => 6,
            'category_id' => 2,
            'title' => 'Вторая новость',
            'text' => 'Описание второй новости экономики'
        ],
        [
            'id' => 7,
            'category_id' =>2,
            'title' => 'Третья новость',
            'text' => 'Описание третьей новости экономики'
        ],
        [
            'id' => 8,
            'category_id' => 2,
            'title' => 'Четвертая новость',
            'text' => 'Описание четвертой новости экономики'
        ],
        [
            'id' => 9,
            'category_id' => 3,
            'title' => 'Первая новость',
            'text' => 'Описание первой новости общества'
        ],
        [
            'id' => 10,
            'category_id' => 3,
            'title' => 'Вторая новость',
            'text' => 'Описание второй новости общества'
        ],
        [
            'id' => 11,
            'category_id' => 3,
            'title' => 'Третья новость',
            'text' => 'Описание третьей новости общества'
        ],
        [
            'id' => 12,
            'category_id' => 3,
            'title' => 'Четвертая новость',
            'text' => 'Описание четвертой новости общества'
        ],
        [
            'id' => 13,
            'category_id' => 4,
            'title' => 'Первая новость',
            'text' => 'Описание первой новости спорта' 
        ],
        [
            'id' => 14,
            'category_id' => 4,
            'title' => 'Вторая новость',
            'text' => 'Описание второй новости спорта'
        ],
        [
            'id' => 15,
            'category_id' => 4,
            'title' => 'Третья новость',
            'text' => 'Описание третьей новости спорта'
        ],
        [
            'id' => 16,
            'category_id' => 4,
            'title' => 'Четвертая новость',
            'text' => 'Описание четвертой новости спорта'
        ],
        [
            'id' => 17,
            'category_id' => 5,
            'title' => 'Первая новость',
            'text' => 'Описание первой новости технологий'
        ],
        [
            'id' => 18,
            'category_id' => 5,
            'title' => 'Вторая новость',
            'text' => 'Описание второй новости технологий'
        ],
        [
            'id' => 19,
            'category_id' => 5,
            'title' => 'Третья новость',
            'text' => 'Описание третьей новости технологий'
        ],
        [
            'id' => 20,
            'category_id' => 5,
            'title' => 'Четвертая новость',
            'text' => 'Описание четвертой новости технологий'
        ]
    ];*/

    public static function getNews() {
        return self::decodeNews();
    }

    public static function encodeNews($array) {
        $jsonNews = json_encode($array);
        return Storage::put('news.json', $jsonNews);
    }

    public static function decodeNews() {
        return json_decode(Storage::get('news.json'), true);
    }

    public static function getNewsByCategoryId($id) {
        $news_by_id =[];
        foreach(self::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news_by_id[] = $item;
            }
        }

        return $news_by_id;
    }

    public static function getNewsById($id) {
        foreach (self::getNews() as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
    }
}
