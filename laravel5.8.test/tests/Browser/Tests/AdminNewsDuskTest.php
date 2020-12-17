<?php

namespace Tests\Browser\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\News;
use App\Models\Categories;
use App\User;
use DB;

class AdminNewsDuskTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @return void
     */
    public function admin_can_edit_news()
    {

        //dump(app()->environment());
        //dump(DB::connection()->getName());
        //dd(DB::connection()->getDatabaseName());

        $user = factory(User::class)->state('withAdminRole')->create();
        $news = factory(News::class)->states(['withCategory', 'withPrivateFalseState'])->create();

        $this->browse(function (Browser $browser) use ($news, $user) {
            $browser->loginAs($user)
                    ->visit(route('admin.news.edit', $news))
                    ->assertSee('Редактировать новость')
                    ->screenshot('01.Новость')
                    ->type('@title', 'Привет из Даска')
                    ->clear('@spoiler')
                    ->screenshot('02.Новость')
                    ->press('@submit')
                    ->pause(1000)
                    ->screenshot('03.Новость')
                    ->assertSee('Поле Краткое описание обязательно для заполнения')
                    ->type('@spoiler', 'Заполнили Краткое описание')
                    ->press('@submit')
                    ->waitForText('Новость успешно отредактирована!')
                    ->screenshot('04.Новость');
        });
    }
}
