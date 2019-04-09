<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin.category.index',compact(['categories','products']));


    }

    public function create()
    {
        $caregories=Category::where('parent_id',0)->get();
        return view('admin.category.create',compact('caregories'));
    }
    public function store(Request $request)
    {
        //
        Category::create($request->all());
        return back()->with('message','Create Category Success');
    }
    public function show($id)
    {

        $products=Category::find($id)->products;

        //
        $categories=Category::all();
        return view('admin.category.index',compact(['categories','products']));
    }

    public function edit($id)
    {

    }

    public function update()
    {

    }
    public function destroy($id)
    {
        //
        Category::findOrFail($id)->delete();

        return redirect()->back();
    }
}
