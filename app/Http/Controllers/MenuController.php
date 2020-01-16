<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Admin's menu section
    public function index()
    {
        // Get all items to view it in menu section
        $menu = Menu::orderBy('id')->get();
        return view('admin.menu.index', compact('menu'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // pass categories variable to creating form, so admin can choose which category this new item belongs to
        $categories = Category::pluck('description', 'id');
        return view('admin.menu.create',compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Storing the new item from $request
        $data = Menu::create($request->all());
        return redirect()->to('/menu');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */

    public function show(Menu $menu)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */

    public function edit(Menu $menu)
    {
        // pass categories variable to creating form, so admin can choose which category this item belongs to
        $categories = Category::pluck('description', 'id');
        return view('admin.menu.edit', compact('menu','categories'));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Menu $menu)
    {
        // update item with data in $request got it from edit item form
        $menu->update($request->all());
        return redirect()->to('/menu');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */

    public function destroy(Menu $menu)
    {
        // delete item from menu
        $menu->delete();
        return redirect()->back();
    }



}
