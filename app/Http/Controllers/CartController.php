<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cart;
use Session;

class CartController extends Controller
{
    public function Home()
    {
        $product = DB::table('product')->get();
        return view('home', compact('product'));
    }

    public function AddCart(Request $request,$Id){
        $product = DB::table('product')->where('ID',$Id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $Id);

            $request->session()->put('Cart', $newCart);
        }
        return view('cart-item');
    }

    public function DeleteItemCart(Request $request,$Id){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($Id);

            if(Count( $newCart->product) > 0){
                $request->Session()->put('Cart',$newCart);
            }
            else{
                $request->Session()->forget('Cart');
            }
            return view('cart-item');
    }

    public function ViewCart(){
        return view('cart');
    }

    public function DeleteListItemCart(Request $request,$Id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($Id);

        if(Count( $newCart->product) > 0){
            $request->Session()->put('Cart',$newCart);
        }
        else{
            $request->Session()->forget('Cart');
        }
        return view('list-cart');
    }

    public function SaveListItemCart(Request $request,$Id, $quanty){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($Id, $quanty);

        $request->Session()->put('Cart',$newCart);
        return view('list-cart');
    }

    public function Checkout(){
        return view('checkout');
    }

    public function Thank(){
        return view('thank');
    }
}
