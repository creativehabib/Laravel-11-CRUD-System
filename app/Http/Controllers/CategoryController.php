<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try{
            (new Category())->storeCategory($request);
            return redirect()->route('category.index')->with('success','Category created successfully');
        }catch(Throwable $throwable){

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try{
            (new Category())->updateCategory($request,$category);
            return redirect()->route('category.index')->with('success','Category updated successfully');
        }catch(Throwable $throwable){

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $imagePath = public_path(Category::IMAGE_UPLOAD_PATH.$category->image);
        if(File::exists($imagePath)){
            File::delete($imagePath);
        }
        $category->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }
}
