<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Categories;
use App\Library\BaseCalcController;
use Illuminate\Http\Request;

class NewsController extends BaseCalcController
{
    public function index() {
        $result = $this->calc->add(4)->mult(5)->div(10)->result();
        //dd($result);

        $categories = Categories::getCategories();

        return view('news.index', ['categories' => $categories, 'title' => 'Категории новостей']);
    }

    public function news($id) {
        $news = News::getNewsByCategoryId($id);
        $category = Categories::getCategoryById($id);

        return view('news.news', ['news' => $news, 'title' => $category->title]);
    }

    public function slug($slug) {
        $news = News::getNewsBySlug($slug);

        return view('news.news', ['news' => $news, 'title' => $slug]);
    }

    public function show($id, $news_id) {
        $one_news = News::getNewsById($news_id);
        $category = Categories::getCategoryById($id);

        return view('news.show', ['category' => $category, 'one_news' => $one_news, 'title' => $category->title . ': ' . $one_news->title]);
    }
}
