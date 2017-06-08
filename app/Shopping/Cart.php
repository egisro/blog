<?php
/**
 * Created by PhpStorm.
 * User: egis
 * Date: 2017-05-16
 * Time: 18:29
 */
namespace App\Shopping;
use App\Product;

class Cart {
    protected $items = [];
    public static function createFromSession()
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = new Cart();
        }
        return($cart);
    }

    public function add($product)
    {
        if (! array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = 1;
        } else {
            $this->items[$product->id] ++;
        }
    }
    public function remove($product)
    {
        if (array_key_exists($product->id, $this->items) && $this->items[$product->id] > 0 ) {

            $this->items[$product->id] --;
        } else {

            unset($this->items[$product->id]);
        }
    }
    public function getItems()
    {
        $items = [];

        foreach ($this->items as $id => $quantity) {
            $product = Product::findOrFail($id);
            $items[] = [
                'product' => $product,
                'quantity' => $quantity,
                'price' => $product->price * $quantity
            ];
        }
        return $items;
    }
    public function getTotalPrice()
    {
        $items = $this->getItems();
        $totalPrice = 0;
        foreach ($items as $item) {
            $price = $item['price'];
            $totalPrice = $totalPrice + $price;
        }
        return $totalPrice;
    }

    public function getTotalQuantity()
    {
        $items = $this->getItems();
        $amount = 0;
        foreach ($items as $item) {
            $amount = $amount + $item['quantity'];
        }
        return $amount;
    }

}
