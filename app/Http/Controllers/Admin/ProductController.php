<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'sku' =>'required',
            'name' =>'required',
            'price' =>'required',
            'description' =>'required',
            'stock' =>'required',
            'photo' =>'required|image'
        ]);

        if ($request->hasFile('photo')) {
            $fileName = $request->file('photo')->getClientOriginalName();
            $uploadFolder = '/uploads/products/';
            $filePath = $uploadFolder . $fileName;

            $request->file('photo')->move(public_path($uploadFolder), $fileName);
        } else {
            return redirect('/admin/products/create')->with('error', 'Please, select photo!');
        }

        $newProduct = new Product();
        $newProduct->sku = $request->sku;
        $newProduct->name = $request->name;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->stock = $request->stock;
        $newProduct->category_id = $request->category_id;
        $newProduct->photo = $filePath;
        $newProduct->save();

        return redirect('/admin/products')->with('success', 'The new product has been added successfully!');
    }

    public function edit($id) {

        $categories = Category::get();

        $product = Product::find($id);

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request) {

        $this->validate($request,[
            'sku' =>'required',
            'name' =>'required',
            'price' =>'required',
            'description' =>'required',
            'stock' =>'required',
            'photo' =>'image'
        ]);

        $product = Product::find($request->id);
        if ($request->hasfile('photo')) {
            $fileName = $request->file('photo')->getClientOriginalName();
            $uploadFolder = '/uploads/categories/';
            $filePath = $uploadFolder . $fileName;

            $request->file('photo')->move(public_path($uploadFolder), $fileName);

            $product->photo = $filePath;
        }
        $product->sku=$request->sku;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->category_id=$request->category_id;
        $product->save();

        return redirect('/admin/products')->with('success', 'The product has been updated successfully!');
    }

    public function delete($id){
        Product::destroy($id);
        return redirect('/admin/products')->with('success','The product has been deleted successfully!');
    }
}
