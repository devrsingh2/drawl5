<?php

namespace App\Http\Controllers\Admin;

use App\Cms;
use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    //
    public function index()
    {
        $items = Cms::all();
        return view('tenant.admin.cms.index', compact('items'));
    }

    public function create()
    {
        return view('tenant.admin.cms.create');
    }

    public function storeCms(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'description' => 'required',
                'body_content' => 'required'
            ],
            [
                'body_content.required' => 'Please enter cms content.'
            ]
        );
        $cms = new Cms();
        $cms->name = $request->name;
        $cms->slug = GeneralHelper::seoUrl($request->name);
        $cms->description = $request->description;
        $cms->content = $request->body_content;
        $cms->status = $request->status;
        $cms->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Cms has been created successfully.');
        return redirect(route('cms.list'));
    }

    public function edit($id)
    {
        $item = Cms::findOrFail($id);
        return view('tenant.admin.cms.edit', compact('item'));
    }

    public function updateCms(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'status' => 'required'
            ]
        );
        $cms = Cms::find($request->edit_id);
        $cms->name = $request->name;
//        $cms->slug = GeneralHelper::seoUrl($request->name);
        $cms->description = $request->description;
        $cms->content = $request->body_content;
        $cms->status = $request->status;
        $cms->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Cms has been updated successfully.');
        return redirect(route('cms.list'));
    }

    public function deleteCms($id)
    {
        $cms = Cms::findOrFail($id);
        $cms->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Cms deleted successfully.');
        return redirect(route('cms.list'));
    }
    public function getCmsPages($slug)
    {
      $page_content = Cms::where('slug', $slug)->first();
      return view('tenant.cms_page', compact('page_content'))->render();
    }
}
