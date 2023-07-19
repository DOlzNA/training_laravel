<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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

    public function createChild(Request $request, int $category_id)
    {

        return view('crm.categories.category-child-create', compact('category_id'));
    }

    public function indexChild(Request $request, int $category_id)
    {
        $categories = Category::whereParentId($category_id)->get();

        return view('crm.categories.category-child', compact('categories', 'category_id'));
    }

    public function store(CategoryRequest $request, int $parent_id)
    {
        $data = $request->all(['name']);
        $data['parent_id'] = $parent_id;
        /**
         * @var Category $categories
         */
        $categories = Category::create($data);


        return redirect()->route('crm.categories.index');
    }

    public function storeChild(CategoryRequest $request, int $parent_id)
    {
        $data = $request->all(['name']);
        $data['parent_id'] = $parent_id;

        Category::create($data);


        return redirect()->route('crm.categories.index');
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();


        return redirect()->route('crm.categories.index');
    }

    public function destroyChild(Request $request, Category $category)
    {
        $category->delete();


        return redirect()->route('crm.categories.index');
    }


}
