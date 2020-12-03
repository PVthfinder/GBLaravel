<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', ['title' => 'Админка']);
    }

    public function categories()
    {
        $categories = Categories::getCategories();

        return view('admin.categories', ['categories' => $categories, 'title' => 'Категории новостей']);
    }

    public function news($id)
    {
        $news = News::getNewsByCategoryId($id);
        $category = Categories::getCategoryById($id);

        return view('admin.news', ['news' => $news, 'title' => $category['title']]);
    }

    public function show($id, $news_id)
    {
        $one_news = News::getNewsById($news_id);
        $category = Categories::getCategoryById($id);

        return view(
            'admin.show',
            ['category' => $category, 'one_news' => $one_news, 'title' => $category['title'] . ': ' . $one_news['title']]
        );
    }

    public function add(Request $request)
    {
        $categories = Categories::getCategories();

        if ($request->method() == 'POST') {

            $request->flash();

            $errors = [];
            $errors[] = 'Заголовок не должен быть пустым';
            $errors[] = 'Новость должна содержать описание';

            $req_arr = $request->except('_token', 'reg');
            $check = $request->get('is_privat');
            if (!$check) {
                $privat = ['is_privat' => "0"];
                $req_arr += $privat;
            }

            foreach ($req_arr as $key => $value) {
                if ($value == null) {
                    Session::flash('errors', $errors);
                    return redirect()->route('admin.add');
                }
            }

            $news = News::decodeNews();

            $max = 0;

            foreach ($news as $item) {
                if ($item['id'] > $max) {
                    $max = $item['id'];
                }
            }

            $id = ['id' => $max];
            $req_arr = $id + $req_arr;
            $news[] = $req_arr;
            News::encodeNews($news);

            return redirect()->route('admin.add');
        }

        return view('admin.add', ['categories' => $categories, 'title' => 'Добавление новости']);
    }

    public function delete($id)
    {
        $news = News::decodeNews();

        foreach ($news as $item) {
            if ($item['id'] == $id) {
                $index = array_search($item, $news);
                array_splice($news, $index, 1);
            }
        }

        News::encodeNews($news);

        return redirect()->route('admin.admin');
    }
}
