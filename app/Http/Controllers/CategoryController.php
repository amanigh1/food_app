<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Admin's Categories section
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        return view('admin.categories.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // form for creating a new category
        return view('admin.categories.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Storing the new category from $request
        $data = Category::create($request->all());
        return redirect()->to('/categories');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show(Category $category)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function edit(Category $category)
    {
        // form for editing category

        return view('admin.categories.edit', compact('category'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        // update item with data in $request got it from edit category form
        $category->update($request->all());
        return redirect()->to('/categories');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        // delete item from menu
        $category->delete();
        return redirect()->back();
    }
}
