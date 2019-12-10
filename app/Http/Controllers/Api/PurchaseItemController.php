<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response as Res;
use App\Purchase;
use Validator;
use App\Helpers\ApiHelper;

class PurchaseItemController extends Controller
{
    public function getPurchaseItem(Request $request)
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

        $purchaseitems = Purchase::with(['requirement','product'])->where('user_id',$request->user_id)->get();
      $response['status'] = Res::HTTP_OK;
      $response['response_time'] = microtime(true) - LARAVEL_START;
      $response['message'] = 'Purchase item list';
      $response['results'] = $purchaseitems;
      return response()->json($response, Res::HTTP_OK);
    }
}
