<?php

namespace App\Models;


class Categories
{
    private const CATEGORIES = [
        [
            'id' => 1,
            'title' => 'Политика'
        ],
        [
            'id' => 2,
            'title' => 'Экономика'
        ],
        [
            'id' => 3,
            'title' => 'Общество'
        ],
        [
            'id' => 4,
            'title' => 'Спорт'
        ],
        [
            'id' => 5,
            'title' => 'Технологии'
        ]
    ];

    public static function getCategories() {
        return self::CATEGORIES;
    }

    public static function getCategoryById($id) {
        foreach (self::getCategories() as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
    }
}
