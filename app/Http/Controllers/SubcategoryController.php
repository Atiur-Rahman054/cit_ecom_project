<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Str;
use Auth;


class SubcategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function create(){
        $all_categories = Category::all();
        return view('subcategory.create',compact('all_categories'));
    }
    public function store(Request $request){
        // print_r($request->all());
        // die();
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories,subcategory_name',
        ]);
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => Str::lower($request->subcategory_name),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('insdone','Subcategory Inserted!');
    }


    public function index(){
        $all_subcategories = Subcategory::all();
        return view('subcategory.index',compact('all_subcategories'));
    }

    public function edit($id){
        $subsingle_info = Subcategory::find($id);
        return view('subcategory.edit',compact('subsingle_info'));
    }

    public function update(Request $request){
        $request->validate([
            'subcategory_name'=>'required',
        ]);
        $subcategory_name = Str::lower($request->subcategory_name);
        Subcategory::findOrFail($request->subcategory_id)->update([
            'subcategory_name'=>$subcategory_name,
        ]);
        return redirect('subcategory/index');
    }

    public function delete($id){
        Subcategory::find($id)->delete();
        return redirect('subcategory/index');
    }
    



}