<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductsProperty;
use Illuminate\Http\Request;
use DB;

class ProductsController extends Controller
{
    public function index()
    {

        $base_url=Controller::$base_url;
        $products = DB::table('categories')->rightJoin('products', 'products.category_id', '=', 'categories.id')->paginate(10); // now we are fetching all products
//        $products=Product::all();
        return view('admin.product.index',compact('products','base_url'));
    }

    public function create()
    {
        $categories=Category::pluck('name','id');
        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $formInput=$request->except('image');

        $this->validate($request,[
            'pro_name'=>'required',
            'pro_code'=>'required',
            'pro_price'=>'required',
            'pro_info'=>'required',
            'spl_price'=>'required',
            'stock'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000',
        ]);
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
        Product::create($formInput);
        return redirect()->back()->with('message','Create Product Success');
    }

    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view('product.show',compact('product'));
    }

    public function edit(Product $product)
    {
        $base_url=Controller::$base_url;
        $categories=Category::pluck('name','id');
        return view('admin.product.edit',compact('product','base_url','categories'));
    }

    public function update($id,Request $request)
    {
        $formInput=$request->except('image','_token','_method');
        $this->validate($request,[
            'pro_name'=>'required',
            'pro_code'=>'required',
            'pro_price'=>'required',
            'pro_info'=>'required',
            'spl_price'=>'required',
            'stock'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000',
        ]);
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

        Product::where('id',$id)
            ->update($formInput);

        return back()->with('message','Update Product Success');
    }

    public function addProperty($id)
    {
        $products=Product::findOrFail($id);
        return view('admin.product.addProperty',compact('products'));
    }

    public function sumbitProperty(Request $request)
    {
        $this->validate($request,[
            'pro_id'=>'required',
            'size'=>'required',
            'color'=>'required',
            'p_price'=>'required',
        ]);
        $properties =new ProductsProperty();
        $properties->pro_id=$request->pro_id;
        $properties->size=$request->size;
        $properties->color=$request->color;
        $properties->p_price=$request->p_price;
        $properties->save();
        return redirect()->back()->with('msg','Add Product Property Success');
    }
}
