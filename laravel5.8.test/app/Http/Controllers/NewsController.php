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

        $categories = Categories::all();

        return view('news.index', ['categories' => $categories, 'title' => 'Категории новостей']);
    }

    public function news($id) {
        $news = News::query()
        ->with('category')
        ->whereIsPrivate(false)
        ->whereHas('category', function($query) use($id) {
            $query->where('id', $id);
        })
        ->paginate(8);

        return view('news.news', ['news' => $news, 'title' => $news->first()->title]);
    }

    public function slug($categoryName) {
        $news = News::query()
        ->with('category')
        ->whereIsPrivate(false)
        ->whereHas('category', function($query) use($categoryName) {
            $query->where('slug', $categoryName);
        })
        ->paginate(8);

        //$news = News::getNewsBySlug($slug);

        return view('news.news', ['news' => $news]);
    }

    public function show($category_id, News $news) {
        return view('news.show', ['category_id' => $category_id, 'news' => $news]);
    }
}
