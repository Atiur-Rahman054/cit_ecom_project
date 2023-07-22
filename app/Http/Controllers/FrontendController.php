<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;

class FrontendController extends Controller
{
    //to view frontend page
    public function index(){
        $banner_data = Banner::all();
        $all_products = Product::all();
        return view('welcome',compact('all_products','banner_data'));
    }
}
