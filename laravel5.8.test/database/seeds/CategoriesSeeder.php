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
            ['title' => 'Политика'],
            ['title' => 'Экономика'],
            ['title' => 'Общество'],
            ['title' => 'Спорт'],
            ['title' => 'Технологии'],
        ];
        
        return $data;
    }
}
