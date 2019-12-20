<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('status', 1)->with('productAdditional')->with('productCategories')->get();
        $categories = Category::where('status', 1)->get();
        if (Auth::check())
        {
            if (request()->user()->role === 2) {
                return redirect(route('user.home'));
            }
            else {
                return redirect(route('admin.home'));
            }
        }
        return view('tenant.home', compact('categories' ,'products'));
    }

    public function addRequirement(Request $request)
    {

        $title=$request->title;
        $description=$request->description;
        $user_id=Auth::user()->id;

        Requirement::create(['user_id'=>$user_id,'title'=>$title,'description'=>$description]);
    }
}
