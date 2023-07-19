<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function shop(Request $request)
    {
        $category_id = (int)$request->input('category_id');
        $categories = Category::get();

        if ($category_id != null) {
            $products = Product::viewProducts($category_id);
        } else {
            $products = Product::get();
        }

        return view('site.shop.shop', compact('categories', 'products'));
    }


}
