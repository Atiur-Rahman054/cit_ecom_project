<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Str;
Use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    //To Add product
    public function create(){
        $all_categories = Category::all();
        $all_subcategories = Subcategory::all();
        return view ('product.create',compact('all_categories','all_subcategories'));
    }

    //To store product
    public function store(Request $request){
        $request->validate([
            'product_name' => 'required',
            'old_price' => 'required|numeric',
            'product_image' => 'Image',
        ]);
        $product_slug = Str::slug(Str::lower($request->product_name));
        $product_sku = Str::lower(Str::substr($request->product_name,0,3)."-".Str::random());
        $product_id = Product::insertGetId([
            'product_name'=>Str::lower($request->product_name),
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'product_slug' => $product_slug,
            'product_sku' => $product_sku,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'short_description' => $request->short_description,
            'created_at' => Carbon::now(),
        ]);
        if($request->hasFile('product_image')){
            $new_image_extension = $request->file('product_image')->getClientOriginalExtension();
            $new_image_name = $product_id.".".$new_image_extension;
            Image::make($request->file('product_image'))->resize(270,310)->save(base_path('public/uploads/product_photo/').$new_image_name);
            Product::find($product_id)->update([
                'product_image' => $new_image_name,
            ]);
        }

        return back()->with('insdone','product inserted');
    }

    //To view product
    public function index(){
        $all_product = Product::all();
        return view('product.index',compact('all_product'));
    }
    
    //To delete image
    public function delete($id){
        if(Product::find($id)->product_image != "default_product_image.jpg"){
            unlink(public_path()."/uploads/product_photo/".Product::find($id)->product_image);
        }
        Product::find($id)->delete();
        return back();
    }

    //To edit image
    public function edit($id){
        $product_info = Product::find($id);
        return view('product.edit',compact('product_info'));
    }

    //To update products
    public function update(Request $request){
        if($request->hasFile('product_image')){
            if(Product::find($request->id)->product_image != "default_product_image.jpg"){
                unlink(public_path()."/uploads/product_photo/".Product::find($request->id)->product_image);
            }
            $new_image_extension = $request->file('product_image')->getClientOriginalExtension();
            $new_image_name = $request->id.".".$new_image_extension;
            Image::make($request->file('product_image'))->resize(270,310)->save(base_path('public/uploads/product_photo/').$new_image_name);
            Product::find($request->id)->update([
            'product_image' => $new_image_name,
            ]);
        }
        return back();
    }
}
