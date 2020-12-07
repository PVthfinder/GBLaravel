<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData() {

        $data = [
            ['title' => 'Политика', 'slug' => 'politics'],
            ['title' => 'Экономика', 'slug' => 'economics'],
            ['title' => 'Общество', 'slug' => 'social'],
            ['title' => 'Спорт', 'slug' => 'sport'],
            ['title' => 'Технологии', 'slug' => 'technologies'],
        ];
        
        return $data;
    }
}
