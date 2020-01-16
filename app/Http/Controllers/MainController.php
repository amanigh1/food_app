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


    // Home Page
    public function index()
    {
        // pass categories table to display categories in home page
        $categories = Category::get();
        return view('index', compact(['categories']));
    }


    // Items Page
    public function itemsPage($category_id)
    {
        // Pass menu & categories table to display items that belong to a specific category
        $menu = Menu::where('category_id', $category_id)->get();
        $category = Category::find($category_id)->description;
        return view('itemsPage', compact('menu','category'));
    }


    // Product Page
    public function product( $item_id)
    {
        // pass item to display its details on Product page
        $item = Menu::find($item_id);

        // check if item is in "cart" or "edited cart" to determine which btn to display "Add to cart" or " view your cart"
        $cart = session()->get('cart');
        if(session()->has('editCart')){
            $cart = session()->get('editCart');
        }elseif (session()->has('cart')){
            $cart = session()->get('cart');
        }else{
            $cart = null;
        }
        return view('product', compact('item','cart'));
    }


    // Admin's Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // Search Page
    public function search()
    {
        // Pass all menu items to search throw them
        $menu = Menu::all();
        return view('search', compact('menu'));
    }

    // Settings Page
    public function settings()
    {
        return view('settings');
    }


}
