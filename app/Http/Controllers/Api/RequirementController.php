<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ApiHelper;
use App\Requirement;
use App\RequirementAdditional;
use Validator;
use \Illuminate\Http\Response as Res;



class RequirementController extends Controller
{
    public function postRequirement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]);
        $response = ApiHelper::responseArray();
        if ($validator->fails()) {
            $response['status'] = Res::HTTP_BAD_REQUEST;
            $response['error_code'] = 1;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Please check your input(s)';
            $response['error'] = $validator->errors()->all();
            return response()->json($response, Res::HTTP_OK);
        }
        $img_dest = public_path('img/requirements');
        $file = $request->file('image');
        if ($file) {
        $name = $file->getClientOriginalName();
        if (file_exists($img_dest."/".$name)){
            unlink($img_dest."/".$name);
        }
        $file->move($img_dest, $name);
        }
        if ($request->all()) {
            $requirement = Requirement::create(['title'=>$request->title, 'description'=>$request->description,'quantity'=>$request->quantity,'user_id'=>$request->user_id,'category_id'=>$request->category_id]);
            if ($file) {
                RequirementAdditional::create(['requirement_id' => $requirement->id, 'attachment' => $name,'status' => "1"]);
            }
            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Requirement Posted  Successfully';
            $response['results'] = $requirement;
            return response()->json($response,Res::HTTP_OK);
        }
        $response['status'] = Res::HTTP_BAD_REQUEST;
        $response['response_time'] = microtime(true) - LARAVEL_START;
        $response['message'] = 'Something went wrong.';
        $response['request'] = $request->all();
        return response()->json($response, Res::HTTP_OK);
    }

    public function getRequirement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);
        $response = ApiHelper::responseArray();

        if ($validator->fails()) {
            $response['status'] = Res::HTTP_BAD_REQUEST;
            $response['error_code'] = 1;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Please check your input(s)';
            $response['error'] = $validator->errors()->all();
            return response()->json($response, Res::HTTP_OK);
        }

        $requirements = Requirement::with('requirementAdditional')->where('user_id', $request->user_id)->get();
        $response['status'] = Res::HTTP_OK;
        $response['response_time'] = microtime(true) - LARAVEL_START;
        $response['message'] = 'Requirement list';
        $response['results'] = $requirements;
        return response()->json($response, Res::HTTP_OK);
    }
}
