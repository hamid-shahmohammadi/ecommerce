<?php

namespace App\Http\Controllers;
use App\Product;
use \Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems=Cart::content();
        return view('cart.index',compact('cartItems'));
    }

    public function addItem($id)
    {
        $product=Product::find($id);
        Cart::add($id,$product->pro_name,1,$product->pro_price,['img'=>$product->image,'stock'=>$product->stock]);
        return back();
    }
    public function destroy($id){
        Cart::remove($id);
        // echo $id;
        return back();
    }

    public function update(Request $request,$id)
    {
        $qty = $request->qty;
        $proId = $request->proId;
        $rowId = $request->rowId; // for update
        Cart::update($rowId, $qty);
        $cartItems = Cart::content();
        return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');

    }

    public function updateCart($rowId,$qty)
    {
        Cart::update($rowId, $qty);
        $carts=[];
        $i=0;
        foreach(Cart::content() as $row) {
            $carts[$i]['id']=$row->id;
            $carts[$i]['rowId']=$row->rowId;
            $carts[$i]['qty']=$row->qty;
            $carts[$i]['price']=$row->price;
            $carts[$i]['name']=$row->name;
            $carts[$i]['img']=$row->options->img;
            $carts[$i]['stock']=$row->options->stock;
            $carts[$i]['subtotal']=$row->subtotal;
            $carts[$i]['tax']=$row->tax;
            $i++;
        }
        return $carts;
    }

    public function getCart()
    {
//        return Cart::content();
        $carts=[];
        $i=0;
        foreach(Cart::content() as $row) {
            $carts[$i]['id']=$row->id;
            $carts[$i]['rowId']=$row->rowId;
            $carts[$i]['qty']=$row->qty;
            $carts[$i]['price']=$row->price;
            $carts[$i]['name']=$row->name;
            $carts[$i]['img']=$row->options->img;
            $carts[$i]['stock']=$row->options->stock;
            $carts[$i]['subtotal']=$row->subtotal;
            $carts[$i]['tax']=$row->tax;
            $i++;
        }
        return $carts;
    }
}
