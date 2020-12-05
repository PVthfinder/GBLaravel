<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Storage;

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

        return view('admin.news', ['news' => $news, 'title' => $category->title]);
    }

    public function show($id, $news_id)
    {
        $one_news = News::getNewsById($news_id);
        $category = Categories::getCategoryById($id);

        return view(
            'admin.show',
            ['category' => $category, 'one_news' => $one_news, 'title' => $category->title . ': ' . $one_news->title]
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

            $req_arr = $request->except('_token', 'image');
            
            if (!$request->get('is_private')) {
                $req_arr['is_private'] = '0';
            }

            if($request->hasFile('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $req_arr['image'] = Storage::url($path);
            }

            foreach ($req_arr as $key => $value) {
                if ($value == null) {
                    Session::flash('errors', $errors);
                    return redirect()->route('admin.add');
                }
            }

            News::addNews($req_arr);

            return redirect()->route('admin.add');
        }

        return view('admin.add', ['categories' => $categories, 'title' => 'Добавление новости']);
    }

    public function delete($id)
    {
        News::deleteNews($id);

        return redirect()->route('admin.admin');
    }
}
