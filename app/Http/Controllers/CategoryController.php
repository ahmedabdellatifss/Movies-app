<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return inertia('Categories/Category', compact('categories'));
    }

    public function create()
    {
        return inertia('Categories/CreateCategory');
    }


    public function store(Request $request)
    {
        Category::create([
            'title'=>$request->title,
            'category'=>$request->category,
        ]);
        
        return redirect()->route('categories.index')->with('message', 'Category Created Successfully');
    }


    public function edit(Category $category)
    {
        return inertia('Categories/EditCategory', ['category'=>$category]);
    }

    public function update(Category $category,Request $request)
    {

        $category->title = $request->title;
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category Updated Successfully');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Category Deleted Successfully');
    }  
}
