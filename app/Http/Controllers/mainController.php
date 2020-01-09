<?php

namespace App\Http\Controllers;


use App\Category;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class mainController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $categories = Category::get();
        return view('index', compact(['categories']));
    }

    public function itemsPage($category_id)
    {
        $menu = Menu::where('category_id', $category_id)->get();
        $category = Category::find($category_id)->description;
        return view('itemsPage', compact('menu','category'));
    }

    public function product($item_id)
    {
        $item = Menu::find($item_id);
        return view('product', compact('item'));
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
