<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use function Pest\Laravel\get;

class CategoryController extends Controller
{

    //

    public function index()
    {
        $categories = Category::get();
        return view('crm.categories.category', compact('categories'));
    }

    public function create(Request $request)
    {
        return view('crm.categories.category-create');
    }

    public function createChild(Request $request)
    {
        return view('crm.categories.category-child-create');
    }

    public function indexChild(Request $request, int $category_id)
    {
        $categories = Category::whereParentId($category_id)->get();
        return view('crm.categories.category-child', compact('categories'));
    }

    public function store(Request $request)
    {
        $frd = $request;
        /**
         * @var Category $categories
         */
        $categories = Category::create([
            'name' => $frd['name'],
            'parent_id' => $frd['parent_id'],

        ]);


        return redirect()->route('crm.categories.index');
    }    public function storeChild(Request $request)
    {
        $frd = $request;
        /**
         * @var Category $categories
         */
        $categories = Category::create([
            'name' => $frd['name'],
            'parent_id' => 'parent_id',
        ]);


        return redirect()->route('crm.categories.child.index');
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete($request);


        return redirect()->route('crm.categories.category');
    }


}
