<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $items = Category::all();
        return view('tenant.admin.categories.index', compact('items'));
    }

    public function create()
    {
        return view('tenant.admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'status' => 'required'
            ]
        );
        $img_dest = public_path('img/category');
        $file = $request->file('image');
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);
        $category = new Category();
        $category->name = $request->name;
        $category->image = $name;
        $category->status = $request->status;
        $category->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Category has been created successfully.');
        return redirect(route('categories.list'));
    }

    public function edit($id)
    {
        $item = Category::findOrFail($id);
        return view('tenant.admin.categories.edit', compact('item'));
    }

    public function updateCategory(Request $request)
    {

        $validator = $this->validate(
            $request,
            [
                'name' => 'required',
                'status' => 'required'
            ]
        );
        $img_dest = public_path('img/category');
        $file = $request->file('image');
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);
        $category = Category::find($request->edit_id);
        $category->name = $request->name;
        $category->image = $name;
        $category->status = $request->status;
        $category->save();

        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Category has been updated successfully.');
        return redirect(route('categories.list'));
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Category deleted successfully.');
        return redirect(route('categories.list'));
    }

}
