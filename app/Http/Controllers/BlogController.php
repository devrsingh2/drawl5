<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function getBlogPage()
    {
        $blogs = Blog::all();

        return view('tenant.blog', compact('blogs'));
    }
    public function getBlogDetail($id)
    {
         $blog = Blog::find($id);

         $date_format =  \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y');
         return view('tenant.blog-detail', compact(['blog','date_format']));
    }

    public function getBlogList()
    {
        $blogs = Blog::all();
        return view('tenant.admin.blog.list-blog', compact('blogs'));
    }
    public function create()
    {
        return view('tenant.admin.blog.create-blog');
    }
    public function storeBlog(Request $request)
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
        $img_dest = public_path('img/blog');
        $file = $request->file('image');
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);

        Blog::create(['title' => request()->title, 'description' => request()->description, 'image' => $name, 'created_by' => auth()->user()->id]);
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Blog added successfully.');
        return redirect(route('blog.list'));
    }
    public function edit($id)
    {
        $blog =  Blog::find($id);
        return view('tenant.admin.blog.edit-blog', compact('blog'));
    }
    public function updateBlog(Request $request)
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
        $img_dest = public_path('img/blog');
        $file = $request->file('image');
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);
        $blog = Blog::find($request->edit_id);
        $blog->title =  $request->title;
        $blog->description =  $request->description;
        $blog->image =  $name;
        $blog->save();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Blog updated successfully.');
        return redirect(route('blog.list'));
    }
    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Blog deleted successfully.');
        return redirect(route('blog.list'));

    }
}
