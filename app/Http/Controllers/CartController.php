<?php

namespace App\Http\Controllers;

use App\Cart;
use App\EditCart;
use App\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request, Menu $product){

        // if session already has 'cart', get cart details and make an instance from Cart class
        if( session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            //if no cart in session, make a new Cart class instance with no previous details.
            $cart = new Cart();
        }

        // add item to cart from $request that comes from adding form in product page
        $cart->add($product, $request->qty);

        // updating cart details in session
        session()->put('cart', $cart);

        return redirect()->to('/product/'.$product->id);
    }

    public function reduceByOne($id){

        // if session already has 'cart', get cart details and make an instance from Cart class
        if( session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            // set $cart to null if it's not in session
            $cart = null;
        }

        // run reduceByOne function
        $cart->reduceByOne($id);

        // if cart total qty <= 0, delete cart from session
        if($cart->totalQty <= 0){
            session()->forget('cart');
        }else{
            // if cart total qty > 0, updating cart details in session
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.show');

    }

    public function increaseByOne($id){

        // if session already has 'cart', get cart details and make an instance from Cart class
        if( session()->has('cart')){
            $cart = new Cart(session()->get('cart'));

        }else{
            // set $cart to null if it's not in session
            $cart = null;
        }

        // run increaseByOne function
        $cart->increaseByOne($id);

        // updating cart details in session
        session()->put('cart', $cart);
        return redirect()->route('cart.show');
    }

    public function showCart(){

        // if session already has 'cart', get cart details and make an instance from Cart class
        if( session()->has('cart')){
            $cart = new Cart(session()->get('cart'));

        }else{
            // set $cart to null if it's not in session

            $cart = null;
        }

        // if session already has 'editCart', get cart details and make an instance from EditCart class

        if( session()->has('editCart')){
            $editCart = new EditCart(session()->get('editCart'));
        }else{

            // set $editCart to null if it's not in session
            $editCart = null;
        }

        //if checkout is false, go to cart page
        if(!$cart->checkout){
            return view('cart.show', compact('cart'));

        }else{
            //if checkout is true, go to edit cart page
            return view('cart.edit', compact('cart','editCart'));
        }
    }

    public function orderReceived()
    {
        /* when customer click on checkout:
         get cart from session and change checkout variable value to true */
        $cart = session()->get('cart');
        $cart->checkout = true;


        return view('cart.orderReceived');
    }

    public function reviewOrder()
    {

        // pass cart and total to display it in review page

        // if session has cart, get cart total and add shipping and tax to it.
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
            $cartTotal = $cart->totalPrice + 14 + ($cart->totalPrice*5/100);

        }else{
            // if session doesn't have cart, set cart to null, and total to 0.
            $cart = null;
            $cartTotal = 0;
        }

        return view('cart.review', compact('cart', 'cartTotal'));
    }

    public function cancelOrder(){

        // delete cart and editCart from session
        session()->forget('cart');
        session()->forget('editCart');
        return view('cart.cancel');
    }

    public function destroy($id){

        // Get cart from session then remove item from cart:
        $cart = new Cart(session()->get('cart'));
        $cart->remove($id);

        // if cart qty <= 0, delete cart from session
        if($cart->totalQty <= 0){
            session()->forget('cart');
        }else{
            // if cart qty > 0, update cart details in session
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }
}
