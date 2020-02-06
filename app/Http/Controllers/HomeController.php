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
        $userLoginId = request()->get('loginId');
        if (isset($userLoginId) && $userLoginId != '') {
            if (auth()->loginUsingId(base64_decode($userLoginId))) {
                request()->session()->flash('alert-class', 'alert-success');
                request()->session()->flash('message', 'Welcome back.');
                return redirect()->intended('home');
            }
        }
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
