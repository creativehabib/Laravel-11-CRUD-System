<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Seo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Throwable;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = (new Post())->get_post_list();
        return view('modules.post.index',compact('posts'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        $post = new Post();
        $category = new Category();
        $categories = (new Category())->get_category_assoc();
        return view('modules.post.create',compact('category','post','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try{
            $post = (new Post())->storePost($request);
            (new Seo())->store_seo($request, $post);
            flash()->success(__('Post created successfully'));
            return redirect()->route('posts.index');
        }catch(Throwable $throwable){

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('modules.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = (new Category())->get_category_assoc();
        return view('modules.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try{
            (new Post())->updatePost($request, $post);
            (new Seo())->update_seo($request, $post);
            flash()->success(__('Post updated successfully'));
            return redirect()->route('posts.index');
        } catch(Throwable $throwable){

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        flash()->success(__('Post deleted successfully'));
        return back();
    }
}
