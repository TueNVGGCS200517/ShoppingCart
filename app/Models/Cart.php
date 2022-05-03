<?php
namespace App\Models;
class Cart{
    public $product = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->product = $cart->product;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product, $Id){
        $newProduct = ['quanty' => 0,'price'=>$product->Price,'productInfo' => $product];
        if($this->product){
            if(array_key_exists($Id, $this->product)){
                $newProduct = $this->product[$Id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->Price;
        $this->product[$Id] = $newProduct;
        $this->totalPrice += $product->Price;
        $this->totalQuanty ++;
    }

    public function DeleteItemCart($Id){
        $this->totalQuanty -= $this->product[$Id]['quanty'];
        $this->totalPrice -= $this->product[$Id]['price'];
        unset($this->product[$Id]);
    }

    public function UpdateItemCart($Id, $quanty){
        $this->totalQuanty -= $this->product[$Id]['quanty'];
        $this->totalPrice -= $this->product[$Id]['price'];

        $this->product[$Id]['quanty'] = $quanty;
        $this->product[$Id]['price'] = $quanty * $this->product[$Id]['productInfo']->Price;

        $this->totalQuanty += $this->product[$Id]['quanty'];
        $this->totalPrice += $this->product[$Id]['price'];
    }
}
?>