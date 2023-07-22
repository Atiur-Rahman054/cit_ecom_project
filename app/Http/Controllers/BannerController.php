<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Image;
use Str;
use Carbon\Carbon;

class BannerController extends Controller
{
    //To create banner data
    public function create(){
        return view('banner.create');
    }

    //To store banner data
    public function store(Request $request){
        $request->validate([
            'banner_title' => 'required',
            'banner_image' => 'image',
        ]);
        $banner_id = Banner::insertGetId([
            'banner_title' => Str::lower($request->banner_title),
            'created_at' => Carbon::now(),
        ]);
        if($request->hasFile('banner_image')){
            $new_img_ext = $request->file('banner_image')->getClientOriginalExtension();
            $new_img_name = $banner_id.".".$new_img_ext;
            Image::make($request->file('banner_image'))->resize(514,583)->save(base_path('public/uploads/banner_photo/').$new_img_name);
            Banner::find($banner_id)->update([
                'banner_image' => $new_img_name,
            ]);
        }
        return back()->with('insdone','banner inserted');
    }
}
