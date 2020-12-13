<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Http\Request;
use Session;
use Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderByDesc('id')->paginate(8);

        return view('admin.news.index', ['news' => $news, 'title' => 'Все новости']);
    }

    public function show(News $news)
    {
        return view('admin.news.edit', ['categories' => Categories::all(), 'news' => $news]);
    }

    public function create()
    {
        return view('admin.news.add', ['categories' => Categories::all()]);
    }

    public function store(Request $request, News $news)
    {
        $news->create($request->all());

        if ($request->hasFile('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $news->image = Storage::url($path);
            $news->save();
        }

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', ['categories' => Categories::all(), 'news' => $news]);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        //$this->validate($request, News::rules());

        $news->update($request->all());

        if ($request->hasFile('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $news->image = Storage::url($path);
            $news->save();
        }

        return redirect()->back()->with('success', 'Новость успешно отредактирована!');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->back()->with('success', 'Новость удалена!');
    }
}
