<?php

namespace App\Http\Controllers;

use Mail;

class MachineComparisonController extends Controller
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

    public function index()
    {
        return view('tenant.user.dashboard', compact(['req_count','bid_count']));
    }

}
