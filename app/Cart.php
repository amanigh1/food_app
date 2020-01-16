<?php

namespace App;


class Cart
{
    public $items =  [];
    public $totalQty;
    public $totalPrice;
    public $checkout = false;

    public function __construct($cart = null)
    {
        // if there is a cart, set this cart variables to the previous cart
        if($cart){
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }
    }


    // Add product function
    public function add($product, $qty){

        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 0,
            'img' => $product->img
        ];

        if(!array_key_exists($product->id, $this->items)){
            // if product is not in cart: add the product to cart and increase cart qty and total price

            $this->items[$product->id] = $item;
            $this->totalQty += $qty;
            $this->totalPrice += $product->price * $qty;
        }else{
            // if product is already in cart: just increase cart qty and total price
            $this->totalQty += $qty;
            $this->totalPrice += $product->price * $qty;
        }

        // increase the previous item's qty by the new qty
        $this->items[$product->id]['qty'] += $qty;
    }

    // Remove product function
    public function remove($id){

        if(array_key_exists($id, $this->items)){

            // reduce cart qty by removed item's qty
            $this->totalQty -= $this->items[$id]['qty'];

            // reduce cart total price by removed item's total price
            $this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['qty'];

            // Remove item from cart list
            unset($this->items[$id]);
        }
    }

    // Reduce by one function
    public function reduceByOne($id){

        // reduce item's qty by 1
        $this->items[$id]['qty']--;

        // reduce cart's total qty by 1
        $this->totalQty --;

        // reduce cart's total price by item's price
        $this->totalPrice -= $this->items[$id]['price'];

        // if item's qty <= 0: remove it from cart list
        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    // Increase by one function
    public function increaseByOne($id){

        // Increase item's qty by 1
        $this->items[$id]['qty']++;

        // Increase cart's total qty by 1
        $this->totalQty ++;

        // Increase cart's total price by item's price
        $this->totalPrice += $this->items[$id]['price'];
    }
}
