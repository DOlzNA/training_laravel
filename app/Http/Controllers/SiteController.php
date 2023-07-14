<?php

namespace App\Http\Controllers;

use App\Models\News;

class SiteController extends Controller
{
    public function index()
    {
return view('welcome');
    }
    public function news()
    {
//        $news=DB::table('$news')->orderBy('id');
        $news = News::query()->orderByDesc('ordering')->get();
        return view('site.news.news', compact('news'));
    }

    public function shop()
    {
    return view('site.shop.shop');
    }
}
