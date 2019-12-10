<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Requirement;
use App\Bid;
use App\Purchase;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requirement = Requirement::whereDate('created_at', Carbon::today())->get();
        $requirement_completed = Requirement::whereDate('created_at', Carbon::today())->get();
        $bid = Bid::whereDate('created_at', Carbon::today())->get();
        $purchase = Purchase::whereDate('created_at', Carbon::today())->get();
        return view('tenant.admin.home', compact('requirement', 'bid', 'purchase', 'requirement_completed'));
    }
}
