<?php

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('news')->insert($this->getData());

        $news = factory(News::class,50)->create();
        //dd($news);
    }

    /*private function getData() {
        $faker = Faker\Factory::create();

        $data = [];

        for ($i=0; $i<50; $i++) {
            $data[] = [
                'category_id' => rand(1,5),
                'image' => '',
                'is_private' => rand(0,1),
                'title' => $faker->sentence(rand(3,5)),
                'spoiler' => $faker->sentence(rand(10,30)),
                'text' => $faker->sentence(rand(100,300))
            ];
        }
        
        return $data;
    }*/
}
