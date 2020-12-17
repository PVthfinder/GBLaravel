<?php

namespace App\Http\Controllers\Admin;

use App\Models\News1;
use App\Models\News;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index', ['title' => 'Админка']);
    }
}
