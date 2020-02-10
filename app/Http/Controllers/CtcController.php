<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFilelHelper;
use Illuminate\Http\Request;
use Mail;

class CtcController extends Controller
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
        return view('tenant.ctc.index');
    }

    public function uploadDrawing(Request $request)
    {
        $this->validate($request, [
            'mc_type' => 'required',
        ]);
        if (request()->hasFile('mc_type')) {
            $imageRes = UploadFilelHelper::uploadFile((object) $request->all());
            return response()->json($imageRes);
        }
        else{
            return "file not present";
        }
    }

}
