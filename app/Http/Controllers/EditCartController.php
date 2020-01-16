<?php

namespace App\Http\Controllers;

use App\Cart;
use App\EditCart;
use App\Menu;
use Illuminate\Http\Request;

class EditCartController extends Controller
{

    public function addToEditCart(Request $request, Menu $product)
    {

        // if session already has 'editCart', get editCart details and make an instance from EditCart class
        if (session()->has('editCart')) {
            $editCart = new EditCart(session()->get('editCart'));
        } else {
            //if no editCart in session, make a new EditCart class instance with no previous details.
            $editCart = new EditCart();
        }

        // add item to $editCart from $request that comes from adding form in product page
        $editCart->add($product, $request->qty);

        // updating editCart details in session
        session()->put('editCart', $editCart);

        return redirect()->to('/product/'.$product->id);
    }

    public function reduceByOne($id)
    {
        // Get editCart details from session and make an instance from EditCart class
        $editCart = new EditCart(session()->get('editCart'));

        // run reduceByOne function
        $editCart->reduceByOne($id);

        // update editCart details in session
        session()->put('editCart', $editCart);

        return redirect()->route('editCart.show');

    }

    public function increaseByOne($id)
    {
        // Get editCart details from session and make an instance from EditCart class
        $editCart = new EditCart(session()->get('editCart'));

        // run increaseByOne function
        $editCart->increaseByOne($id);

        // update editCart details in session
        session()->put('editCart', $editCart);

        return redirect()->route('editCart.show');
    }

    public function showCart()
    {
        /*when customer click on Edit Order:
          set "isEditing" to true, so "view your cart" btn changes to "edit your cart"*/
        session()->put('isEditing', true);

        // Get old cart details from session
        $oldCart = session()->get('cart');

        // if session has editCart -> get its deltails and make an instance from EditCart class..
        if (session()->has('editCart')) {
            $editCart = session()->has('editCart');

        } else {

            // if session doesn't have editCart -> make an instance from EditCart class with the old cart details..
            $editCart = new EditCart($oldCart);
            session()->put('editCart', $editCart);
        }

        // get editCart details from session
        $editCart = new EditCart(session()->get('editCart'));

        // set oldTotal to old cart total price + shipping + tax
        $oldTotal = $oldCart->totalPrice + 14 + ($oldCart->totalPrice * 5 / 100);

        if ($editCart->totalQty < 1) {
            // if editCart qty < 1: set $newTotal to editCart total price + tax - oldTitle "No Shipping"
            $newTotal = $editCart->totalPrice + ($editCart->totalPrice * 5 / 100) - $oldTotal;
        } else {
            // if editCart qty > 1: set $newTotal to editCart total price + shipping + tax - oldTitle + shipping
            $newTotal = $editCart->totalPrice + ($editCart->totalPrice * 5 / 100) - $oldTotal + 14;

        }

        // calculate tax
        $tax = $editCart->totalPrice * 5 / 100;

        return view('cart.editedCart', compact('editCart', 'oldTotal', 'newTotal', 'tax'));

    }

    public function editOrderReceived()
    {
        // When customer ends from editing his order
        // delete "is Editing" from session
        session()->forget('isEditing');

        return view('cart.editOrderReceived');
    }

    public function editReviewOrder()
    {

        /*when customer click on Edit Order:
         set "isEditing" to true, so "view your cart" btn changes to "edit your cart"*/
        session()->put('isEdited', true);

        // get editCart details from session
        $editCart = new EditCart(session()->get('editCart'));

        // Get old cart details from session
        $oldCart = session()->get('cart');

        // set oldTotal to old cart total price + shipping + tax
        $oldTotal = $oldCart->totalPrice + 14 + ($oldCart->totalPrice * 5 / 100);


        if ($editCart->totalQty < 1) {
            // if editCart qty < 1: set $newTotal to editCart total price + tax - oldTitle "No Shipping"
            $newTotal = $editCart->totalPrice + ($editCart->totalPrice * 5 / 100) - $oldTotal;

        } else {
            // if editCart qty > 1: set $newTotal to editCart total price + shipping + tax - oldTitle + shipping
            $newTotal = $editCart->totalPrice + ($editCart->totalPrice * 5 / 100) - $oldTotal + 14;

        }

        // cart total will be the sum of old and new cart "edited cart"
        $cartTotal = $oldTotal + $newTotal;

        return view('cart.editReview', compact('editCart', 'cartTotal'));
    }

    public function cancelOrder()
    {
        // Remove cart from session
        session()->forget('cart');
        return view('cart.cancel');
    }

    public function destroy($id)
    {

        // Get editCart details from session
        $editCart = new EditCart(session()->get('editCart'));

            // remove item from editCart
            $editCart->remove($id);

            // Update editCart details in session
            session()->put('editCart', $editCart);


        return redirect()->route('editCart.show');
    }


}

