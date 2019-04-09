<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }


    public function orders() {
        $user_id = Auth::user()->id;
        // $orders=Orders_products::all();
        $orders = DB::table('order_product')->leftJoin('products', 'products.id', '=', 'order_product.product_id')->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')->where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders', compact('orders'));
    }

    public function Address() {
        $user_id = Auth::user()->id;
        $address_data = DB::table('address')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->get();
        return view('profile.address', compact('address_data'));
    }


    public function updateAddress(Request $request) {
        $this->validate($request, [
            'fullname' => 'required|min:5|max:35',
            'pincode' => 'required|numeric',
            'city' => 'required|min:5|max:25',
            'state' => 'required|min:5|max:25',
            'country' => 'required']);


        DB::table('address')->where('id', $request->input('address_id'))->update($request->except('_token','address_id'));

        return back()->with('msg','Your address has been updated');
    }

    public function addressEdit(Address $address)
    {
        return view('profile.addressForm',compact('address'));
    }



    public function Password() {
        return view('profile.updatePassword');
    }


    public function updatePassword(Request $request) {
        $oldPassword = $request->oldPassword;

        $newPassword = $request->newPassword;


        if(!Hash::check($oldPassword, Auth::user()->password)){
            return back()->with('msg','The specified password does not match the database password'); //when user enter wrong password as current password

        }else{
            $request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
            return back()->with('msg','Password has been updated');
        }
        // echo 'here update query for password';
    }
}
