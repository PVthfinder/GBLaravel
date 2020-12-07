<?php

namespace Tests\Feature;

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
}
