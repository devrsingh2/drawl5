<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    //
    public function create()
    {
        return view('tenant.admin.tenants.create');
    }
}
