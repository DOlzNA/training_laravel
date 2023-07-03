<?php

namespace App\Http\Controllers;

use App\Models\News;

class SiteController extends Controller
{
    public function index()
    {
return view('welcome');
    }
    public function news(News $news)
    {
//        $news=DB::table('$news')->orderBy('id');
        $news = $news->orderByDesc('ordering')->get();
        return view('site.news.news', compact('news'));
    }
}
