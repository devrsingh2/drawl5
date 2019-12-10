<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    public function getTestimonialList()
    {
        $testimonials = Testimonial::all();
        return view('tenant.admin.testimonial.list-testimonial', compact('testimonials'));
    }
    public function create()
    {
        return view('tenant.admin.testimonial.create-testimonial');
    }
    public function storeTestimonial(Request $request)
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
        $img_dest = public_path('img/testimonial');
        $file = $request->file('image');
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);

        Testimonial::create(['title' => request()->title, 'description' => request()->description, 'image' => $name, 'created_by' => auth()->user()->id]);
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Testimonial added successfully.');
        return redirect(route('testimonial.list'));
    }
    public function edit($id)
    {
        $testimonial =  Testimonial::find($id);
        return view('tenant.admin.testimonial.edit-testimonial', compact('testimonial'));
    }
    public function updateTestimonial(Request $request)
    {

        $validator = $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpeg,jpg,png'
            ],
            [
                'image.mimes' => 'File must be image'
            ]
        );
        $img_dest = public_path('img/testimonial');
        $file = $request->file('image');
        if($file){
        $name=$file->getClientOriginalName();
        if (file_exists($img_dest.'/'.$name)) {
            unlink($img_dest . '/' . $name);
        }
        $file->move($img_dest, $name);
        }
        $testimonial = Testimonial::find($request->edit_id);
        $testimonial->title =  $request->title;
        $testimonial->description =  $request->description;
        if($file) {
            $testimonial->image = $name;
        }
        $testimonial->save();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Testimonial updated successfully.');
        return redirect(route('testimonial.list'));
    }
    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Testimonial deleted successfully.');
        return redirect(route('testimonial.list'));

    }

}
