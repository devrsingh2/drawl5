<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{

    public function getBannerList()
    {
        $banners = Banner::all();
        return view('tenant.admin.banner.list-banner', compact('banners'));
    }
    public function create()
    {
        return view('tenant.admin.banner.create-banner');
    }
    public function storeBanner(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png'
            ],
            [
                'image.mimes' => 'File must be image'
            ]
        );
        $img_dest = public_path('img/banner');
        $file = $request->file('image');
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);

        Banner::create(['title' => request()->title, 'description' => request()->description, 'image' => $name]);
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Banner added successfully.');
        return redirect(route('banner.list'));
    }
    public function edit($id)
    {
        $banner =  Banner::find($id);
        return view('tenant.admin.banner.edit-banner', compact('banner'));
    }
    public function updateBanner(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png'
            ],
            [
                'image.mimes' => 'File must be image'
            ]
        );
        $img_dest = public_path('img/banner');
        $file = $request->file('image');
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);
        $banner = Banner::find($request->edit_id);
        $banner->title =  $request->title;
        $banner->description =  $request->description;
        $banner->image =  $name;
        $banner->save();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Banner updated successfully.');
        return redirect(route('banner.list'));
    }
    public function deleteBanner($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Banner deleted successfully.');
        return redirect(route('banner.list'));

    }
}
