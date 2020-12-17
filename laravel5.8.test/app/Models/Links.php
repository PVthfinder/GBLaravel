<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    private const LINKS = [
        'https://lenta.ru/rss/news',
        'https://news.yandex.ru/world.rss',
        'https://news.yandex.ru/music.rss'
    ];

    public static function getLinks() {
        return self::LINKS;
    }
}
