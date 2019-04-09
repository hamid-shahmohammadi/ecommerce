<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $cartItems = Cart::content();
            return view('front.checkout', compact('cartItems'));
        }else {
            return redirect('login');
        }
    }

    public function formvalidate(Request $request)
    {

        $this->validate($request, [
            'fullname' => 'required|min:5|max:35',
            'pincode' => 'required|numeric',
            'city' => 'required|min:5|max:25',
            'state' => 'required|min:5|max:35',
            'country' => 'required']);


        $userid = Auth::user()->id;
        $address = new Address();
        $address->fullname = $request->fullname;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->pincode = $request->pincode;
        $address->country = $request->country;
        $address->payment_type = $request->pay;
        $address->user_id = $userid;
        $address->save();
//        dd('done');
        Order::createOrder();
//
        Cart::destroy();
        return redirect('profile/thankyou');
    }
}
