<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::get();

        return view('admin.category.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $fileName = $request->file('photo')->getClientOriginalName();
            $uploadFolder = '/uploads/categories/';
            $filePath = $uploadFolder . $fileName;

            $request->file('photo')->move(public_path($uploadFolder), $fileName);
        } else {
            return redirect('/admin/categories/create')->with('error', 'Please, select photo!');
        }

        $newCat = new Category();
        $newCat->name = $request->name;
        $newCat->photo = $filePath;
        $newCat->save();

        return redirect('/admin/categories')->with('success', 'The new category has been added successfully!');
    }

    public function delete($id)
    {
        Category::destroy($id);

        return redirect('/admin/categories')->with('success', 'The category has been deleted successfully!');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);

        if ($request->hasFile('photo')) {
            $fileName = $request->file('photo')->getClientOriginalName();
            $uploadFolder = '/uploads/categories/';
            $filePath = $uploadFolder . $fileName;

            $request->file('photo')->move(public_path($uploadFolder), $fileName);

            $category->photo = $filePath;
        }

        $category->name = $request->name;
        $category->save();

        return redirect('/admin/categories')->with('success', 'The category has been updated successfully!');
    }
}
