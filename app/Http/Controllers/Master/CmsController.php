<?php

namespace App\Http\Controllers\Master;

use App\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class CmsController extends Controller
{
    //
    public function getCmsPages($slug)
    {
        $page_content = Cms::where('slug', $slug)->first();
        return view('tenant.cms_page', compact('page_content'))->render();
    }

}
