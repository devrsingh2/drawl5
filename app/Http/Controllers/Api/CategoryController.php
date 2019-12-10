<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Helpers\ApiHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response as Res;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $response = ApiHelper::responseArray();
        $cateories = Category::where('status', 1)
            ->get();
        if (isset($cateories) && count($cateories) > 0) {
            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'Categories List';
            $response['results'] = $cateories;
            return response()->json($response, Res::HTTP_OK);
        }
        else {
            $response['status'] = Res::HTTP_OK;
            $response['response_time'] = microtime(true) - LARAVEL_START;
            $response['message'] = 'No Categories';
            $response['results'] = [];
            return response()->json($response, Res::HTTP_OK);
        }

    }

}
