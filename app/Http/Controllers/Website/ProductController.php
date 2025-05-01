<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $product = Product::with(['category.products' => function ($query) use ($id) {
            $query->orderBy('views', 'desc')
                ->where('id', '!=', $id)
                ->limit(4);
        }])->find($id);

        /* $relatedProducts = Product::where('category_id', $product->category->id)
            ->where('id', '!=', $product->id)
            ->get(); */

        $product->increment('views');

        return view('website.product', compact('product'));
    }
}
