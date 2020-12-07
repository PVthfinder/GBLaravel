<?php

namespace App\Http\Controllers\Admin;

use App\Models\News1;
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

    /*public function categories()
    {
        $categories = Categories::getCategories();

        return view('admin.categories', ['categories' => $categories, 'title' => 'Категории новостей']);
    }*/

    public function news()
    {
        //$category = Categories::getCategoryById($id);
        //$news = News1::getNewsByCategoryId($id);
        //$news = News::all();
        $news = News::paginate(8);

        return view('admin.news', ['news' => $news, 'title' => 'Все новости']);
    }

    public function add(News $news, Request $request)
    {
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

            $news->fill($req_arr)->save();

            return redirect()->route('admin.news.add');
        }

        return view('admin.add', ['categories' => Categories::all(), 'news' => $news]);
    }

    public function edit(News $news, Request $request)
    {
        //$news = News::findOrFail($id);
        if ($request->method() == 'POST') {

            $request->flash();

            $req_arr = $request->except('_token', 'image');
            
            if (!$request->get('is_private')) {
                $req_arr['is_private'] = '0';
            }

            $req_arr['image'] = '';

            if($request->hasFile('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $req_arr['image'] = Storage::url($path);
            }

            $news->fill($req_arr)->save();

            return redirect()->route('admin.news.edit', $news);
        }

        return view('admin.add', ['categories' => Categories::all(), 'news' => $news]);
    }

    public function delete($id)
    {
        News::destroy($id);

        return redirect()->route('admin.admin');
    }
}
