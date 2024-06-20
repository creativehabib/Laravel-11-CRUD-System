<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seo;
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
        $categories = (new Category())->get_category_list();
        return view('modules.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $categories = (new Category())->get_category_assoc();
        return view('modules.category.create',compact('category','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        try{
            $category = (new Category())->storeCategory($request);
            $seo = (new Seo())->store_seo($request, $category);
            return redirect()->route('category.index')->with('success','Category created successfully');
        }catch(Throwable $throwable){

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('modules.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = (new Category())->get_category_assoc();
        return view('modules.category.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try{
            (new Category())->updateCategory($request,$category);
            (new Seo())->update_seo($request, $category);
            return redirect()->route('category.index')->with('success','Category updated successfully');
        }catch(Throwable $throwable){

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }


    public function updateStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status;
        if ($category->save()) {
            return 1;
        }
        return 0;
    }
}
