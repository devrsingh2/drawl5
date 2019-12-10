<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;

class FaqController extends Controller
{
    public function getFaqPage()
    {
        $faqs = FAQ::all();
        return view('tenant.faq', compact('faqs'));
    }
    public function getFaqList()
    {
        $faqs = FAQ::all();
        return view('tenant.admin.faq.list-faq', compact('faqs'));
    }
    public function create()
    {
        return view('tenant.admin.faq.create-faq');
    }
    public function storeFaq(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'question' => 'required',
                'answer' => 'required',
            ]
        );
        FAQ::create(['question' => request()->question, 'answer' => request()->answer]);
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Question added successfully.');
        return redirect(route('faq.list'));
    }
    public function edit($id)
    {
        $faq =  FAQ::find($id);
        return view('tenant.admin.faq.edit-faq', compact('faq'));
    }
    public function updateFaq(Request $request)
    {

        $validator = $this->validate(
            $request,
            [
                'question' => 'required',
                'answer' => 'required',
            ]
        );
        $faq = FAQ::find($request->edit_id);
        $faq->question =  $request->question;
        $faq->answer =  $request->answer;
        $faq->save();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'FAQ updated successfully.');
        return redirect(route('faq.list'));
    }
    public function deleteFaq($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', 'Question deleted successfully.');
        return redirect(route('faq.list'));

    }
}
