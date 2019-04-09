<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::all();
        $categories=Category::all();
        return view('front.home',compact('products','categories'));
    }

    public function shop()
    {
        $products=Product::all();
        $categories=Category::all();
        return view('front.shop',compact('products','categories'));
    }

    public function product_details($id)
    {
        $product=Product::findOrFail($id);
        return view('front.product_details',compact('product'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function wishlist(Request $request) {

        $wishList = new WishList();
        $wishList->user_id = Auth::user()->id;
        $wishList->pro_id = $request->pro_id;

        $wishList->save();
        return back();

//        $Products = DB::table('products')->where('id', $request->pro_id)->get();
//
//        return view('front.product_details', compact('Products'));
    }

    public function View_wishList() {

        $Products = DB::table('wishlist')->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->get();
        return view('front.wishList', compact('Products'));
    }

    public function removeWishList()
    {
        
    }
}
