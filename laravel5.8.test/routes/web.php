<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

/*Route::post('/', function () {
    return view('index');
});*/

Route::get('/', 'IndexController@index')->name('home');

Route::group(['prefix' => '/categories', 'as' => 'categories.'], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/{id}', 'NewsController@news')->where('id', '[0-9]+')->name('news');
    Route::get('/{slug}', 'NewsController@slug')->name('slug');
    Route::get('/{id}/{news}', 'NewsController@show')->name('show');
    //Route::get('/{id}/comments/{comment?}', 'NewsController@comments')->name('comments');
});

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::match(['get', 'patch'], '/add', 'AdminController@add')->name('add');
    Route::get('/delete/{id}', 'AdminController@delete')->name('delete');
    Route::group(['prefix' => '/news', 'as' => 'news.'], function () {
        Route::get('/', 'AdminController@news')->name('news');
        Route::match(['get', 'post'], '/edit/{news}', 'AdminController@edit')->name('edit');
        Route::get('/{news_id}', 'AdminController@show')->name('show');
        //Route::get('/{id}/comments/{comment?}', 'NewsController@comments')->name('comments');
    });
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('storage/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);
    dd($type);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});