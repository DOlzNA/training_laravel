<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        return view('crm.categories.products.product');
    }
}
