<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin.category.index',compact(['categories','products']));


    }

    public function getGategory()
    {
        $categories=Category::select(['id','name','parent_id']);
        return DataTables::of($categories)

            ->addColumn('edit', function (){
                return '<a href="" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
            })
            ->addColumn('checkbox',function ($category){
                return "<input type='checkbox' name='selected[]' value='".$category->id."'>";
            })
            ->escapeColumns(['checkbox'])
            ->make(true);
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

    public function removeCategory(Request $request)
    {
        $selected=$request->input('selected');
        Category::destroy($selected);
        return back()->with('msg','category deleted successfully!');
    }
}
