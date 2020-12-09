<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminNewsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/admin/categories');

        $response->assertStatus(200);
    }

    public function it_can_post_form()
    {
        $faker = \Faker\Factory::create('ru_RU');

        $data[] = [
            'category_id' => rand(1,5),
            'image' => '',
            'is_private' => rand(0,1),
            'title' => $faker->sentence(rand(3,5)),
            'spoiler' => $faker->sentence(rand(10,30)),
            'text' => $faker->sentence(rand(100,300))
        ];

        $response = $this->post('/admin/news/add', $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('news', $data);
    }

    public function it_can_post_edit_form()
    {
        #0. Тест на пустой БД (trait DatabaseMigrations)
        #1. Создаем новость с помощью фабрики
        #2. Отправляем данные в форму редактирования
        #3. Проверяем, что в БД данные по новости изменились

        $faker = \Faker\Factory::create('ru_RU');

        $news = factory(News::class)->states(['withCategory', 'withPrivateFalseState'])->create();
        $newTitle = $faker->sentence(rand(3,5));
        $newSpoiler = $faker->sentence(rand(10,30));

        $data[] = [
            'category_id' => 1,
            'image' => '',
            'is_private' => rand(0,1),
            'title' => $newTitle,
            'spoiler' => $newSpoiler,
            'text' => $news->text
        ];

        $response = $this->patch(route('admin.news.update', $news), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('news', $news->toArray());
        $this->assertDatabaseHas('news', $data);
    }
}
