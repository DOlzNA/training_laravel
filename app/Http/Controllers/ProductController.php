<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::get();
        return view('crm.categories.products.product', compact('products'));
    }
    public function create()
    {
        return view('crm.categories.products.product-create');
    }
    public function store(Request $request)
    {
        $data=$request->all(['name','price','description','image_url','is_published','category_id']);
        $product=Product::create($data);

        if (isset($data['image_url'])) {

            /**
             * @var Media $productMedia
             */
            $productMedia = $product->addMedia($request->file('image_url'))->toMediaCollection('product-imgs');

            if ($productMedia !== null) {
                $product->setImageUrl(str_replace(config('app.url'), '', $productMedia->getUrl()));
                $product->save();
            }
        }


        return redirect()->route('crm.products.index');

    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('crm.products.index');
    }
}
